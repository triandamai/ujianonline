<?php
@session_start();
include "+koneksi.php";

$id_tq = @$_GET['id_tq'];
$no = 1;
$no2 = 1;
$sql_tq = mysqli_query($db, "SELECT * FROM tb_topik_quiz JOIN tb_mapel ON tb_topik_quiz.id_mapel = tb_mapel.id WHERE id_tq = '$id_tq'") or die ($db->error);
$data_tq = mysqli_fetch_array($sql_tq);

?>
<script src="style/assets/js/jquery-1.11.1.js"></script>
<script src="style/assets/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-ls/3.2.1/vue-ls.min.js"></script>
<script>

$(document).ready(function() {
	  init();
	 
});
var waktunya = <?php echo $data_tq['waktu_soal']; ?>;
var waktu;
var jalan = 0;
var habis = 0;
var data ;
var data_soal;

function init(){
    checkCookie();
    mulai();
}
function keluar(){
    if(habis==0){
        setCookie('waktux',waktu,365);
    }else{
        setCookie('waktux',0,-1);
    }
}
function mulai(){
    jam = Math.floor(waktu/3600);
    sisa = waktu%3600;
    menit = Math.floor(sisa/60);
    sisa2 = sisa%60
    detik = sisa2%60;
    if(detik<10){
        detikx = "0"+detik;
    }else{
        detikx = detik;
    }
    if(menit<10){
        menitx = "0"+menit;
    }else{
        menitx = menit;
    }
    if(jam<10){
        jamx = "0"+jam;
    }else{
        jamx = jam;
    }
    document.getElementById("divwaktu").innerHTML = jamx+" Jam : "+menitx+" Menit : "+detikx +" Detik";
    waktu --;
    if(waktu>0){
        t = setTimeout("mulai()",1000);
        jalan = 1;
    }else{
        if(jalan==1){
            clearTimeout(t);
        }
        habis = 1;
        document.getElementById("kirim").click();
    }
}
function selesai(){    
    if(jalan==1){
        clearTimeout(t);
    }
    habis = 1;
}
function getCookie(c_name){
    if (document.cookie.length>0){
        c_start=document.cookie.indexOf(c_name + "=");
        if (c_start!=-1){
            c_start=c_start + c_name.length+1;
            c_end=document.cookie.indexOf(";",c_start);
            if (c_end==-1) c_end=document.cookie.length;
            return unescape(document.cookie.substring(c_start,c_end));
        }
    }
    return "";
}
function setCookie(c_name,value,expiredays){
    var exdate=new Date();
    exdate.setDate(exdate.getDate()+expiredays);
    document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}
function checkCookie(){
    waktuy=getCookie('waktux');
    if (waktuy!=null && waktuy!=""){
        waktu = waktuy;
    }else{
        waktu = waktunya;
        setCookie('waktux',waktunya,7);
    }
}
</script>
<script type="text/javascript">
    window.history.forward();
    function noBack(){ window.history.forward(); }
</script>

<?php
if(@$_SESSION['siswa']) { ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Ujian Online E-Learning SMK Indonesia</title>
    <link href="style/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="style/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="style/assets/css/style.css" rel="stylesheet" />
    <style type="text/css">
    .mrg-del {
        margin: 0;
        padding: 0;
    }
    </style>
</head>
<body >

<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./">
                <img src="style/assets/img/logo.png" />
            </a>
        </div>

        <div class="left-div">
            <div class="user-settings-wrapper">
                <ul class="nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
	
</div>

<div id="demo" class="content-wrapper">
	<timer-soal></timer-soal>
	
   
</div>

<script type="text/x-template" id="timer">
 <div class="container">
		<div class="row">
		    <div class="col-md-12">
		        <h4 class="page-head-line">Test :<?php echo $data_tq['judul']; ?> <u></u><br />Mapel : <?php echo $data_tq['mapel']; ?><u></u></h4>
		    </div>
		</div>

		<div class="row">
			<div class="col-md-4">
		        <div class="panel panel-default">
		            <div class="panel-heading"><b>Info <small>(Sisa waktu Anda)</small></b></div>
		            <div class="panel-body">
			            <h3 align="center"><span id="divwaktu"></span></h3>
		            </div>
		        </div>
		    </div>
			<form-soal></form-soal>
		</div>

	</div>
</script>
<script type="text/x-template" id="form_soal">
		    <div class="col-md-8">
	
		    	<div>
                        <div  class="panel panel-default">
                            <div class="panel-heading"><b>Soal Pilihan Ganda ({{this.data.length}}) Soal jawaban benar/salah {{this.jawaban_benar}}{{this.jawaban.salah}}{{this.tidak_jawab}}</b></div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                   
        								<table class="table">
        							    	<tr>
        							    		<td width="10%">( {{this.currentSoal.no_soal}} )</td>
        							            <td><b>
												{{this.currentSoal.pertanyaan}}
												</b></td>
        							        </tr>
                                         
                                                <tr>
                                                    <td>
												
													</td>
                                                    <td v-if="this.currentSoal.gambar !== 'tidak'">
                                                        <img width="220px" v-bind:src="'http://localhost/ujianonline/admin/img_soal/' + currentSoal.gambar" />
                                                    </td>
                                                </tr>
                                         
        							        <tr>
        							        	<td></td>
        							            <td>
                                                    <div class="radio mrg-del">
                                                        <label>
                                                            <input type="radio"  :disabled="isDisabled" v-model="jawaban" name="soal_pilgan" value="A" /> A. {{this.currentSoal.pil_a}}
                                                        </label>
                                                    </div>
                                                </td>
        							        </tr>
        							        <tr>
        							        	<td></td>
        							            <td>
                                                    <div class="radio mrg-del">
                                                        <label>
                                                            <input type="radio"  :disabled="isDisabled" v-model="jawaban" name="soal_pilgan" value="B" /> B. {{this.currentSoal.pil_b}}
                                                        </label>
                                                    </div>
                                                </td>
        							        </tr>
        							        <tr>
        							        	<td></td>
        							            <td>
                                                    <div class="radio mrg-del">
                                                        <label>
                                                            <input type="radio"  :disabled="isDisabled" v-model="jawaban" name="soal_pilgan" value="C" /> C. {{this.currentSoal.pil_c}}
                                                        </label>
                                                    </div>
                                                </td>
        							        </tr>
        							        <tr>
        							        	<td></td>
        							            <td>
                                                    <div class="radio mrg-del">
                                                        <label>
                                                            <input type="radio"  :disabled="isDisabled" v-model="jawaban" name="soal_pilgan" value="D" /> D. {{this.currentSoal.pil_d}}
                                                        </label>
                                                    </div>
                                                </td>
        							        </tr>
        							        <tr>
        							        	<td></td>
        							            <td>
                                                    <div class="radio mrg-del">
                                                        <label>
                                                            <input type="radio"  :disabled="isDisabled" v-model="jawaban" name="soal_pilgan" value="E" /> E. {{this.currentSoal.pil_e}}
                                                        </label>
                                                    </div>
                                                </td>
        							        </tr>
        								</table>
                                
                                    <input type="hidden" name="jumlahsoalpilgan" />
    							</div>
    			            </div>
    			        </div>
                
                        <!-- <div class="panel panel-default">
                            <div class="panel-heading"><b>Soal Essay</b></div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                  
                                        <table class="table">
                                            <tr>
                                                <td width="10%">( 1 )</td>
                                                <td><b></b></td>
                                            </tr>
                                           
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <img width="220px" src="admin/img/gambar_soal_essay/" />
                                                    </td>
                                                </tr>
                                       
                                            <tr>
                                                <td>Jawab</td>
                                                <td>
                                                    <textarea name="soal_essay" class="form-control" rows="3"></textarea>
                                                </td>
                                            </tr>
                                        </table>
                                   
                                </div>
                            </div>
                        </div> -->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div>
								<button @click="prevSoal()" class="btn btn-info">Soal Sebelumnya</button>
                                <button @click="saveandnext()" class="btn btn-danger">Simpan dan lanjut</button>
								<button v-if="!isLast" @click="nextSoal()" class="btn btn-info">Soal Selanjutnya</button>
                                <button v-if="isLast" @click="exit()" class="btn btn-info">Selesai</button>
                            </div>
                            
                            
                        </div>
                    </div>
		        </div>
		    </div>
</script>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                &copy; 2015 E-Learing SMK Indonesia | By : yukcoding.blogspot.com
            </div>

        </div>
    </div>
</footer>
<script>
var id_siswa1 = <?php echo $_SESSION['siswa']?>;
Vue.component('form-soal', {
  data:  ()=> {
    return {
	  count: 0,
	  data:[],
	  currentSoal:"",
      isDisabled:false,
	  jawaban :"",
	  jawaban_benar : 0,
	  jawaban_salah : 0,
	  tidak_jawab:0,
      isLast : false,
	  stage : {
		  index : 0,
		  current : 0,
		  length:0
	  }
    }
  },
  created(){
	this.getData();
	// /this.initJawaban();
		
  },
  mounted(){
	this.getData();
	//this.initJawaban();
		
        
  },
  methods:{
      exit: function(){
		var persen = (this.data.length - this.tidak_jawab) * 100 /1000;
		var data = new FormData();
		  data.append('nilai',"ya");
		  data.append('id_tq',Number(this.currentSoal.id_tq));
		  data.append('id_soal',Number(this.currentSoal.id_tq));
		  data.append('id_siswa',<?php echo $_SESSION['siswa']?>);
		  data.append('jawaban_benar',Number(this.jawaban_benar));
		  data.append('jawaban_salah',Number(this.jawaban_salah));
		  data.append('tidak_dikerjakan',Number(this.tidak_jawab));
		  data.append('persen',persen);

		axios.post("http://localhost/ujianonline/simpan_jawaban_pilgan.php",data)
		.then(result => {
			console.log(result);
			localStorage.clear();
			window.location.href = 'http://localhost/ujianonline/?page=quiz&action=infokerjakan&id_tq=68';
		}).catch(err => {
			console.log(err);
		});
           },
	  validasiJawaban: function (){
		if(this.jawaban == "" || this.jawaban == null){
			var cek = this.tidak_jawab +this.jawaban_benar+this.jawaban_salah;
		
				this.tidak_jawab++;
		
				console.log("kelebihan tidak jawab"+this.tidak_jawab);
			
		}else{
			var cek = this.tidak_jawab +this.jawaban_benar+this.jawaban_salah;
			if(cek <= this.data.length){
				if(this.jawaban == this.currentSoal.kunci){
			
						this.jawaban_benar++;
					
				console.log("jawaban benar + 1"+this.jawaban_benar);
				}else{
					
						this.jawaban_salah++;
					
					
				console.log("jawaban sala + 1"+this.jawaban_salah);
				}
			}else{
				console.log("kelebihan jawaban");
			}
			
		}
	  },
      initJawaban: function(){
         // console.log(this.currentSoal.id_pilgan+"hai");
          console.log(localStorage.getItem('storeJawaban'+this.currentSoal.id_pilgan));
        if(localStorage.getItem('storeJawaban'+this.currentSoal.id_pilgan)){
            var lsj = JSON.parse(localStorage.getItem('storeJawaban'+this.currentSoal.id_pilgan));
           console.log(lsj.jawaban);
		  
            this.jawaban = lsj.jawaban
            this.isDisabled = false;
        }else{
             this.isDisabled = false;
			 
        }
      },
	  getData: function (){
		  
			this.isDisabled = false;
		axios.get("http://localhost/ujianonline/getData_soal.php?id_tq=<?php echo $id_tq?>")
    .then( (response) =>{
			this.data = response.data.data
			this.currentSoal = response.data.data[0]
			
			//console.log(response.data.data);
			
            this.initJawaban();
		
      
    })
    .catch(function (error) {
		console.log(error);
      
    });   
	  },
	  nextSoal: function(){
		  if(this.stage.index >= this.data.length - 1){
            this.isLast = true;
			//console.log(this.stage.index+" lebih besar sama"+this.data.length)
		  }else{
			this.initJawaban();
            this.isLast = false;
			this.stage.index++;
           
			
		  }
		  this.currentSoal = this.data[this.stage.index];
	  },
	  prevSoal: function(){
		  if(this.stage.index <= 0){
            this.isLast = true;
			 // console.log(this.stage.index +"lebih kecil sama"+this.data.length+"/ 0");
		  }else{
			this.initJawaban();
            this.isLast = false;
			this.stage.index--;
            
            
		}
		this.currentSoal = this.data[this.stage.index];
	  },
	  saveandnext:function(){
        if(this.stage.index >= this.data.length - 1){
			//console.log(this.stage.index+" lebih besar sama"+this.data.length)
            this.isLast = true;
		  }else{
            this.isLast = false;
           
            //console.log(this.stage.index+" - "+this.data.length);
          var data = new FormData();
		  data.append('pilgan',"ya");
		  data.append('id_tq',Number(this.currentSoal.id_tq));
		  data.append('id_soal',Number(this.currentSoal.id_pilgan));
		  data.append('id_siswa',<?php echo $_SESSION['siswa']?>);
		  data.append('jawaban',this.jawaban);

         
		//  console.log(data);
		axios.post("http://localhost/ujianonline/simpan_jawaban_pilgan.php",data)
		.then(result => {
			//console.log(result);
			if(result.data.success){
                
				this.validasiJawaban();
				this.stage.index++;
				var ls = {
              'id_soal' : this.currentSoal.id_pilgan,
              'jawaban' : this.jawaban
          }
                    localStorage.setItem('storeJawaban'+this.currentSoal.id_pilgan, JSON.stringify(ls));
				
			}else{
				//console.log(result);
			}
            this.currentSoal = this.data[this.stage.index];
			this.initJawaban();
		}).catch(err => {
			console.log(err);
		});
		  }
		 
	  },
	  
  },
  template: '#form_soal'
})
Vue.component('timer-soal',{

	data : () =>{return {
		data : ""
	}
},
	template: '#timer'
})
new Vue({ el: '#demo' })
</script>
</body>
</html>
<?php }?>

import React, { useRef,useState, useEffect } from 'react';
import {Selectelement,Imputelement,Btnelement} from './Element'
import qr from './services/QueryService'
import axios from 'axios';


const form = (props) => {
  const [next, setNext] = useState(false);
  const [surface , setSurface ] = useState(0);
  const [arrform,setArrform] = useState([]);
  const [asurface,setAsurface] = useState(false);
  const [formfilled,setFormfilled] = useState(false)
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString)
  const ssmtitle = urlParams.get('ssm')
  const [priseencharge, setPriseencharge] = useState(0)
  const [remboursement,setRemboursement] = useState(0)
  const [arrpost,setArrpost] = useState([])
  const [rescreproj,setRescreproj] = useState("")
  const columns = props.columns

  const querytest = () => {
   const list = "id,nom"
   const q = qr.filteredlist(list,"typeprojets","familleprojet_nom","Les énergies renouvelables")
  // console.log(q)

  }
  
  const afficheresult =  Object.entries(arrform).map(([key,value])=>{
    const result = columns.filter(function(word) {
    return word.node.chpcha == value.name;
    });

    if(result[0]) {
     
      return (<div key={key}><li className="list-group-item"><span className="badge badge-secondary">{result[0].node.chplib}</span><h3 className="text-center">{value.value}</h3></li></div>)
    } else{
      return;
    }

      
  })



  const onButtonClick =(e)=> {
      e.preventDefault()
      console.log(arrpost)
      const formdata =  Object.values($("#simform").serializeArray());
      setArrform(formdata)
      setFormfilled(true)
      const brnhide = $("#btndiv").hide();
      if(ssmtitle=="Créer projet"){
        
        let  temparr = []
        
        temparr["place1"] = "draft"
        arrpost.push(temparr)
        setArrpost(arrpost)
        temparr = []
        let d = new Date();
        let Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}
        temparr["nom"] = "Proj"+"-"+Base64.encode(arrpost[0].user+arrpost[0].typeprojet)
        arrpost.push(temparr)
        setArrpost(arrpost)
        arrpost.splice(2,1)
        setArrpost(arrpost)
        temparr = []
        const inptval = $("#surface").val() 
        if(inptval!="" && parseInt(inptval) > 0 ){
          temparr["surface"] = parseInt(inptval)
          arrpost.push(temparr)
          setArrpost(arrpost)
          console.log(arrpost)
        }

        
        let bodyq = "{";
        for (const [key, value] of Object.entries(arrpost)) {
          for (const [index, val] of Object.entries(value)) {
           if(index=="surface"){
            bodyq=bodyq.concat(`"${index}": ${val},`);
           } else{
            bodyq=bodyq.concat(`"${index}": "${val}",`);
           }
          }
        }
        bodyq = bodyq.slice(0, bodyq.length-1)
        bodyq = bodyq.concat("}")

        const qerypost = `mutation{createProjet(input:{${bodyq}}){ projet{ nom } }
       }`

        let  url1 = localStorage.getItem("url")
        url1 =    url1+'/api/projets'   
        axios({
          url:  url1,
          method: "POST",
          headers: {
            'Content-Type': 'application/json',
        },
          data: bodyq
        }).then((result) => {
          console.log(result)
          setRescreproj(result.data.nom)
        })
      
    
      }
   
  }; 

  const onNext = ()=>{
      setNext(false)
  }

  const onInputchange = (val) => {
      setNext(true)
      setSurface(parseInt(val.value))
      let temparr = []
      temparr["surface"] = val.value
      setArrform(temparr)


  }

  const onSelectchange = (val,e) => {
     e.preventDefault()
     if(e.nativeEvent.target.selectedIndex) {
       let index = e.nativeEvent.target.selectedIndex;
       let label = e.nativeEvent.target[index].text;
       let  temparr = []
      
       temparr[e.nativeEvent.srcElement.name] = e.nativeEvent.target[index].id
       if(ssmtitle=="Créer projet"){
         arrpost.push(temparr)
         setArrpost(arrpost)
         
      }
        if(val=="familleprojet"){
                const opthide = $("#typeprojet option").hide();
                const tp = $("#typeprojet option[data-familleprojet='"+label+"']").show(); 
            
              } 
              if(val=="typeprojet"){
                const boolsurf = $("#typeprojet option:selected").data( "asurface" );
                const priseencharge = $("#typeprojet option:selected").data( "pe" );
                const plafondbool = $("#typeprojet option:selected").data( "plafondbool" );
                const montantplafonf = $("#typeprojet option:selected").data( "montantplafond" );
                if(plafondbool){
                
                    setRemboursement(montantplafonf) 
                }
              if(boolsurf){
            setAsurface("true")
            
            setPriseencharge(parseInt(priseencharge)) 


              }
              }
        }
     
     if(e.target.value){
       setNext(true)
      }
      
  }; 
  
  useEffect(() => {  
        // Met à jour le titre du document via l’API du navigateur  0
      if(next==false)  {
        querytest()
        $("#next").hide();
        $("#prev").hide();

      }else {
        $("#next").show();
        $("#prev").show();
      }
      if(asurface){
        console.log("pe : "+priseencharge +" surface :" + surface )
       if(priseencharge > 0) setRemboursement(priseencharge*surface) 
      }

  }); 

  const listItems = columns.map((col,key) => { 
        switch (col.node.chptyp) {
        case "inputnumber":
              return  asurface=="true"? (
             <div className={key==0? "carousel-item active": "carousel-item"}  id="inpt"  key={col.node.id}><br></br><h2 className="text-center" >{col.node.chplib} :</h2><Imputelement  handler={onInputchange} col={col}  />
              </div>):""
              break;
        case "select":
          return  <div className={key==0? "carousel-item active": "carousel-item"}  key={col.node.id}><br></br><h2 className="text-center">{col.node.chplib} :</h2 > <Selectelement typeval="labelvalue" handler={onSelectchange}  col={col}/></div>
        break;    
        case "btnsend":
          return  <div className={key==0? "carousel-item active": "carousel-item"} id="btndiv" key={col.node.id}><br></br><h2 className="text-center">{col.node.chplib} :</h2> <Btnelement  handler={onButtonClick} col={col} label={col.node.chplib}/></div>
        break;    
        default:
        break;
        }
      });
         return ( 
    <div>

         <h2 className="text-center alert-danger">{ssmtitle}</h2>
      <form id="simform" >

       
          <div id="simul" className="carousel slide alert-secondary " data-ride="carousel" data-interval="false" >
            <ul className="carousel-indicators">
              {columns.map((col,key)=> {
                <li data-target="#simul" data-slide-to={key} className={key==0? "active": ""}></li>
              })}
            </ul>
            <div className="carousel-inner">
                  {listItems}
            </div>  
            <a className="carousel-control-prev" id="prev"  href="#simul" data-slide="prev">
                <span className="carousel-control-prev-icon bg-success"></span>
         </a>
          <a className="carousel-control-next " onClick={onNext}  id="next" href="#simul" data-slide="next">
                <span className="carousel-control-next-icon bg-success"></span>
          </a> 
 
          </div>
         
          </form>
          {formfilled ? (<div className="bg-light">
            <h2 className="text-center bg-success">Votre projet</h2>
            {afficheresult}
            <h2 className="text-center  bg-info">Montant maximum de la prise en charge : {remboursement} €</h2>
            </div>) : ""} 
           { rescreproj ? 
          <h4 className="text-center bg-secondary ">Votre projet a été crée sous le nom {rescreproj} </h4>
          : "" 
          }
         
    </div>
     );
}
 
export default form;
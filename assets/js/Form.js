import React, { useRef,useState, useEffect } from 'react';
import {Selectelement,Imputelement,Btnelement} from './Element'
import qr from './services/QueryService'
import axios from 'axios';


const form = (props) => {
  const [next, setNext] = useState(false);
  const [energie_id , setEnergie_id ] = useState("");
  const [typehabitat_id , setTypehabitat_id ] = useState("");
  const [taillesurface_id  , setTaillesurface_id  ] = useState("");
  const [departement_id 	 , setDepartement_id 	 ] = useState("");
  const [typeprojet_id  , setTypeprojet_id  ] = useState("");
  const [surface , setSurface ] = useState(0);
  const [arrform,setArrform] = useState([]);
  const [asurface,setAsurface] = useState(false);

  const columns = props.columns

  const querytest = () => {
   const list = "id,nom"
   const q = qr.filteredlist(list,"typeprojets","familleprojet_nom","Les énergies renouvelables")
  // console.log(q)

  }


  const onButtonClick =(e)=> {
      
    e.preventDefault()
    


     axios({
      url: "/simulation",
      method: "POST",
      data: JSON.stringify(jsc)
    }).then((result) => {
      console.log(result)
    })
  
      
  }; 

    const onNext = ()=>{
      setNext(false)
    }
    const onInputchange = (val) => {
      setNext(true)
      console.log("inp ch")
      console.log(val.value)
      setSurface(val.value)
      const temparr = []
      temparr["surface"] = val.value
      setArrform(temparr)
    }

    const onSelectchange = (val,e) => {
     e.preventDefault()
     if(e.nativeEvent.target.selectedIndex) {
       let index = e.nativeEvent.target.selectedIndex;
       let label = e.nativeEvent.target[index].text;
        console.log(label);

        if(val=="familleprojet"){
          const opthide = $("#typeprojet_id option").hide();
          const tp = $("#typeprojet_id option[data-familleprojet='"+label+"']").show(); 
          console.log(tp)
        } 
        if(val=="typeprojet_id"){
          const boolsurf = $("#typeprojet_id option:selected").data( "asurface" );
        //  const hidesurf = $("#inpt").hide();
          console.log(typeof(boolsurf))
         if(boolsurf){
       setAsurface("true")
         }
        }
     }
     console.log(e)
     if(e.target.value){
       setNext(true)
       console.log(e.target.value)
       console.log(val)
       console.log("depuis change")
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

      }); 

    const listItems = columns.map((col,key) => { 
        switch (col.node.chptyp) {
        case "inputnumber":
              return  asurface=="true"? (
             <div className={key==0? "carousel-item active": "carousel-item"}  id="inpt"  key={col.node.id}><br></br><h2>{col.node.chplib} :</h2><Imputelement handler={onInputchange} col={col}  />
              </div>):""
              break;
        case "select":
          return  <div className={key==0? "carousel-item active": "carousel-item"}  key={col.node.id}><br></br><h2>{col.node.chplib} :</h2> <Selectelement  handler={onSelectchange}  col={col}/></div>
        break;    
        case "btnsend":
          return  <div className={key==0? "carousel-item active": "carousel-item"}  key={col.node.id}><br></br><h2>{col.node.chplib} :</h2> <Btnelement handler={onButtonClick} col={col} label={col.node.chplib}/></div>
        break;    
        default:
        break;
        }
      });
         return ( 
    <div>
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
 
 
          </div>
          <a className="carousel-control-prev" id="prev"  href="#simul" data-slide="prev">
                <span className="carousel-control-prev-icon bg-success"></span>
         </a>
          <a className="carousel-control-next " onClick={onNext}  id="next" href="#simul" data-slide="next">
                <span className="carousel-control-next-icon bg-success"></span>
          </a> 
          </form> 
    </div>
     );
}
 
export default form;
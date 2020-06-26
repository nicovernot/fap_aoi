import React, {Component,  useState ,useEffect } from 'react';
import axios from 'axios';

function Strelement(props) {
   
const se = <p className={props.class}>{props.label}t</p>
return (
    <div>
        {se}
    </div>
    );
}

function Urlelement (props) {
   
const ue = <a href={props.url} className={props.class}>{props.label}t</a>
return (
    <div>
        {ue}
    </div>
    );
}

function Titlelelement (props) {
   
    const ue = <h1  className={props.class}>{props.label}t</h1>
    return (
        <div>
            {ue}
        </div>
        );
    }

 function TextInputelement (props) {
    
        const ue =  <label>
        Nom :
        <input type="text" name="name" />
      </label>
        return (
            <div>
                {ue}
            </div>
            );
    }

    function Imgelement (props) {
    
        const ue = <img  className="w-30"  src={props.img}/>
        return (
            <div>
                {ue}
            </div>
            );
    }

    function Imputelement (props) {
        const [inputvalue, setInputvalue] = useState([])
        var e = new Event('input', { bubbles: true });
        const ue = <input onChange={(e) => setInputvalue([...inputvalue,{[props.col.node.chpcha]:e.target.value}]),(e) =>props.handler(e.target)}  type="number"  className="form-control" name={props.col.node.chpcha} />
        return (
            <div>
                {ue}
            </div>
            );
    }

    function TextArea_element (props) {
    
        const ue = <textarea>
        Bonjour, voici du texte dans une zone de texte
      </textarea>
        return (
            <div>
                {ue}
            </div>
            );
    }

    function Selectelement (props) {
        const [selctdata, setSelectdata] = useState([]);
        const [selitem,setSelitem] = useState([])
        const [load, setLoad] = useState(false);
        useEffect(() => {  
        let filled =true
            const champsachercher = props.col.node.chpsel.split('{')
            let  url1 = localStorage.getItem("url")
            url1 =    url1+'/api/graphql'  
            if (filled){

                axios({
                    url: url1,
                    method: 'POST',
                    data: {
                        query: props.col.node.chpsel
                    }
                }).then((result) => {    
                    if(selctdata.length==0)  setSelectdata(result.data.data[champsachercher[1].trim()].edges)
                    
                });
            }
              return () => {
             filled = false
                console.log("cleaned up");
              };

        },[]);
 
      
        const ue = <select id={props.col.node.chpcha}  onChange={(e)=> setSelitem([...selitem,{[props.col.node.chpcha]:e.target.value}]), (e) =>props.handler(props.col.node.chpcha,e)} className="form-control"  name={props.col.node.chpcha}>
            <option>Faites un choix</option>
       { selctdata.map((option,index)=><option key={option.node.id} data-asurface={ option.node.contientsuraface ? option.node.contientsuraface :""	} data-pe={option.node.priseencharge ? option.node.priseencharge : "" } data-familleprojet={ option.node.familleprojet? option.node.familleprojet["nom"] :"" } id={option.node.id} value={props.typeval=="labelvalue" ? option.node.nom : option.node.id }>{option.node.nom}</option>)}
      
      </select>
        return (
            <div>
                {ue}
            </div>
            );
    }
    function Btnelement (props) {
   
            const ue = <button className="btn alert-success" onClick={(e) => props.handler(e)} >{props.label}</button>
            return (
                <div>
                    {ue}
                </div>
                );
     }

    

export {Strelement,Urlelement,Titlelelement,Imgelement,Btnelement,Imputelement,Selectelement};
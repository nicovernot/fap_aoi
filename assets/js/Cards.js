import React, { Component } from 'react';
import {Strelement,Urlelement,Titlelelement,Imgelement,Btnelement} from './Element'
import Card from 'react-bootstrap/Card'
import ListGroup from 'react-bootstrap/ListGroup'
import ReactMarkdown from "react-markdown";

function Crd (props){
const card = props.card
const champs = props.champs

const cardr = Object.entries(champs).map(([key,value])=>{
   
    switch(value.node.chptyp) {
        case 'img':
         
          return (<div className="list-group-item"><Imgelement className="p-3"  img={card[value.node.chpcha]}/></div>);
          break;
          case 'imgarray':
         
            return (<div className="list-group-item">{ card[value.node.chpcha]? <Imgelement className="p-3" style="width: 18rem;"  img={card[value.node.chpcha][0]['url']}/>: ''}</div>);
            break;        
        case 'varchar':

            return (<li className="list-group-item" key={key}> <span className="badge badge-secondary"> {value.node.chplib} : </span><ReactMarkdown source={card[value.node.chpcha]} />  </li>);
            break;  
        case 'title':
         
            return (<li className="list-group-item" key={key}> <h3>{card[value.node.chpcha]}</h3></li>);
            break;          
        case 'int':
         
                return (<li className="list-group-item" key={key}> {value.node.chplib} : <span class="badge badge-secondary">{card[value.node.chpcha]}</span></li>);
                break;  
        case 'double':
         
                    return (<li className="list-group-item" key={key}> {value.node.chplib} : <span class="badge badge-secondary">{card[value.node.chpcha]}</span></li>);
                    break;  
            
        default:
        
          return   (<li className="list-group-item" key={key}> {value.node.chplib} : {card[value.node.chpcha]}</li>); 
          break;
   
      } 

  })
    return (
   
       <Card className="mx-auto col p-3 alert alert-primary w-40 animate__animated animate__fadeIn">
            {cardr}
       </Card>
    
    );
}

function Cards (props){
    const champs = props.columns
    const data = props.data
    const cardList = Object.entries(data).map(([key,value])=>{
       
        return (
            <Crd key={key} champs={champs} card={value}/>
        );
      })

    return (
<div className="bg-dark" > 
            {cardList}
</div>
        
    );
}

export default Cards;
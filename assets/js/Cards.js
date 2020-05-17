import React, { Component } from 'react';
import {Strelement,Urlelement,Titlelelement,Imgelement,Btnelement} from './Element'
import Card from 'react-bootstrap/Card'
import ListGroup from 'react-bootstrap/ListGroup'
function Crd (props){
const card = props.card
const champs = props.champs

const cardr = Object.entries(champs).map(([key,value])=>{
    console.log(value.node.chptyp)
    switch(value.node.chptyp) {
        case 'img':
         
          return (<div className="list-group-item"><Imgelement className="p-3"  img={card[value.node.chpcha]}/></div>);
          break;
         
        case 'varchar':
         
            return (<li className="list-group-item" key={key}> {value.node.chplib} : {card[value.node.chpcha]}</li>);
            break;  
        
        case 'int':
         
                return (<li className="list-group-item" key={key}> {value.node.chplib} : <span className="badge badge-secondary">{card[value.node.chpcha]}</span></li>);
                break;  
        case 'double':
         
                    return (<li className="list-group-item" key={key}> {value.node.chplib} : <span className="badge badge-secondary">{card[value.node.chpcha]}</span></li>);
                    break;  
            
        default:
        
          return   (<li className="list-group-item" key={key}> {value.node.chplib} : {card[value.node.chpcha]}</li>); 
          break;
   
      } 

  })
    return (
   
       <Card className="col">
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
<div className="row bg-secondary p-3 " > 
            {cardList}
</div>
        
    );
}

export default Cards;
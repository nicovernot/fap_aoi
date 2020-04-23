import React, { Component } from 'react';
import {Strelement,Urlelement,Titlelelement,Imgelement,Btnelement} from './Element'
import Card from 'react-bootstrap/Card'
import ListGroup from 'react-bootstrap/ListGroup'
function Crd (props){
const card = props.card
const champs = props.champs
const cardr = Object.entries(champs).map(([key,value])=>{
      
    return (
    <li key={key}> {value.node.chplib} : {card[value.node.chpcha]}</li> 
    );
  })
    return (
        <Card border="primary" className="my-2"  className="bg-primary" style={{ width: '18rem' }}>
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
        <ListGroup> 
            {cardList}
        </ListGroup>
    );
}

export default Cards;
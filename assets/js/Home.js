import React, { useState,Component } from 'react';
import styled from 'styled-components';

function Home(props)  {

    const divStyle = {
      margin: '40px',
      border: '5px solid pink',
      "&:hover": {
            background: "#efefef"
          }
   
           
      
    };
    const Topbtn = styled.a`
    position: fixed;
    bottom: 40px;
    float: right;
    right: 18.5%;
    left: 77.25%;
    max-width: 80px;
    width: 100%;
    font-size: 16px;
    border-color: rgba(85, 85, 85, 0.2);
    background-color: MediumSeaGreen;
    padding: .5px;
    border-radius: 4px;

    @media (max-height: 700px) {
      
        display: none;
    
    }

:hover {
    background-color: #7dbbf1;
}
    `


    const Flame = styled.div `
    margin:80px auto;
    width: 60px;
    height: 60px;
    
    transform-origin:center bottom;
    animation-name: flicker;
    animation-duration:3ms;
    animation-delay:200ms;
    animation-timing-function: ease-in;
    animation-iteration-count: infinite;
    animation-direction: alternate;
    border-color: #333;

    div.flame{
      bottom:0;
      position:absolute;
      border-bottom-right-radius: 50%;
      border-bottom-left-radius: 50%;
      border-top-left-radius: 50%;
      transform:rotate(-45deg) scale(1.5,1.5);
    }
    
    div.yellow{
      left:15px; 
      width: 30px;
      height: 30px;
      background:gold;
      box-shadow: 0px 0px 9px 4px gold;
    }
    
    div.orange{
      left:10px; 
      width: 40px;
      height: 40px;
      background:orange;
      box-shadow: 0px 0px 9px 4px orange;
    }
    
    div.red{
      left:5px;
      width: 50px;
      height: 50px;
      background:OrangeRed;
      box-shadow: 0px 0px 5px 4px OrangeRed;
    }
    
    div.white{
      left:15px; 
      bottom:-4px;
      width: 30px;
      height: 30px;
      background:white;
      box-shadow: 0px 0px 9px 4px white;
    }
    
    div.circle{
      border-radius: 50%;
      position:absolute;  
    }
    
    div.blue{
      width: 10px;
      height: 10px;
      left:25px;
      bottom:-25px; 
      background: SlateBlue;
      box-shadow: 0px 0px 15px 10px SlateBlue;
    }
    
    div.black{
      width: 40px;
      height: 40px;
      left:10px;
      bottom:-60px;  
      background: black;
      box-shadow: 0px 0px 15px 10px black;
    }
    
    @keyframes flicker{
      0%   {transform: rotate(-1deg);}
      20%  {transform: rotate(1deg);}
      40%  {transform: rotate(-1deg);}
      60%  {transform: rotate(1deg) scaleY(1.04);}
      80%  {transform: rotate(-2deg) scaleY(0.92);}
      100% {transform: rotate(1deg);}
    }
    `
    const H1hover = styled.h1`
    :hover {
      border-color: #333;
      transform: scale(1.1);
      i {
        text-align: center;
        color: Tomato;
      }
      border-radius: 50%;
      /* transition quand la souris survole */
      transition: all 1s;
      
}
    `

    const DivHover = styled.div`
	color: #000;
	:hover {
            border-color: #333;
            i {
              text-align: center;
              color: Tomato;
            }
            transform: scale(1.1);
            border-radius: 50%;
            /* transition quand la souris survole */
            transition: all 1s;
            -webkit-mask-image: linear-gradient(-75deg, rgba(0,0,0,.6) 30%, #000 50%, rgba(0,0,0,.6) 70%);
            -webkit-mask-size: 200%;
            animation: shine 2s infinite;
            
      }
      :before {
            content: "";
            position: absolute;
            top: -25px;
            left: 0;
            width: 0;
            height: 0;
            border-left: 50px solid transparent;
            border-right: 50px solid transparent;
          
          }
          :after {
            content: "";
            position: absolute;
            bottom: -25px;
            left: 0;
            width: 0;
            height: 0;
            border-left: 50px solid transparent;
            border-right: 50px solid transparent;
            
          }
`
    return (
        <div action="#top">
            <h1> Économisez <span className="text-primary"> votre énergie</span>  et <span className="text-primary"> votre argent</span> en rénovant votre logement ! </h1>
          <div className="row">
          
          <img className="w-120 col" src="/img/famille.jpeg" style={{width: "45%","margin": "auto"}} />
          <H1hover className="col text-success"><i className='fas fa-fire-alt' style={{"fontSize":"48px"}}></i> Mes projets vous propose une Prime pour vos travaux de rénovation énergétique.
N’attendez-plus: Faites une
simulation ! </H1hover>
          </div>
          <div class="row">
            <DivHover className={' jumbotron alert-primary col text-center text-secondary  m-4 shadow-lg '}  
             id="div1" style={divStyle}><i class="fas fa-file-alt" style={{"fontSize":"36px"}}></i><h3>Notre Démarche</h3></DivHover>
            <DivHover className={'jumbotron alert-danger col text-center text-secondary  m-4 shadow-lg '}  
             style={divStyle}><i class="far fa-money-bill-alt" style={{"fontSize":"36px"}}></i><h3>Simulez votre prime </h3> </DivHover>
            <DivHover className={'jumbotron alert-success col text-center text-secondary m-4 shadow-lg '}  
             style={divStyle}><i class=" far fa-id-card" 
            style={{"fontSize":"36px"}}></i><h3>Inscrivez vous</h3></DivHover>
            <DivHover className={'jumbotron alert-dark col text-center text-secondary m-4 shadow-lg '}  
            style={divStyle}><i class="fas fa-eye" style={{"ffontSize":"36px"}}></i><h3>Infos</h3></DivHover>
           </div>
           <div className="row bg-dark">

                <div className="col-md-12 col-lg-9">
                  <h1 className="text-light">Optez pour un <span className="text-primary"> équipement performant</span>  et bénéficiez du Coup de Pouce  <span className="text-primary"> Chauffage</span> et d'une prime jusqu'à 4 000 €* </h1>
                </div>     
                <Flame className="col-md-2 col-lg-1">
                  <div className="red flame"></div>
                  <div className="orange flame"></div>
                  <div className="yellow flame"></div>
                  <div className="white flame"></div>
                  <div className="blue circle"></div>
                  <div className="black circle"></div>
                </Flame>
                <div >
                  <p className="text-light">*Montant de votre Prime Eco Travaux Carrefour fourni à titre indicatif, susceptible d'évolution depuis le jour de votre simulation jusqu'à la validation de votre dossier. Le montant définitif de votre prime est calculé à validation de votre dossier. La prime est versée sur votre Compte Fidélité Carrefour à validation de votre dossier.</p> 
                </div>
           </div>
           <br></br>
           
           <div class="container">
           <img className="w-120 col" src="/img/econrj.jpeg" style={{width: "100%","margin": "auto"}} />
            <div className="bottom-left">Bottom Left</div>
            <div className="top-left">Top Left</div>
            <div className="top-right">Top Right</div>
            <div className="bottom-right">Bottom Right</div>
            <div className="centered">Centered</div>
        </div> 
        <div class="row">
            <div className="col jumbotron alert-info m-1 shadow-lg"><i class="far fa-money-bill-alt" style={{"fontSize":"36px"}}></i>Une question</div>
            <div className="col jumbotron alert-success m-1 shadow-lg"><i class=" far fa-id-card" style={{"fontSize":"36px"}}></i>inscription gratuite</div>
            <div className="col jumbotron alert-danger m-1 shadow-lg"><i class="fas fa-eye" style={{"ffontSize":"36px"}}></i>+ de 15 travaux élegibles</div>
            <div className="col jumbotron alert-dark m-1 shadow-lg"><i class="far fa-money-bill-alt" style={{"fontSize":"36px"}}></i>jusqu'à 400€ remboursés</div>
        </div> 
        <Topbtn className="btn btn-outline-dark" href="#top">Retour</Topbtn>
        </div>
      );
  }

  export default Home;
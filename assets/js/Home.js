import React, { useState,useEffect } from 'react';
import styled from 'styled-components';

function Home(props)  {

  let [scrolly, setScrolly] = useState(0);
  function logit() {
    setScrolly(window.pageYOffset);
  }

  useEffect(() => {
    
   
  }, []);
  
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
const Wrapper = styled.section`
  padding: 4em;
  background: papayawhip;
`;

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
    const Mapimage = styled.div`
    position: relative;
    text-align: center;
    color: white;
    text-shadow: 2px 2px 4px #000000; 
  
  .bottom-left {
    position: absolute;
    bottom: 8px;
    left: 16px;
  }
  
  .top-left {
    position: absolute;
    top: 8px;
    left: 16px;
  }
  
  .top-right {
    position: absolute;
    top: 8px;
    right: 16px;
  }
  
  .bottom-right {
    position: absolute;
    bottom: 8px;
    right: 16px;
  }
  
  .centered {
    position: absolute;
    top: 90%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

    `
    const H1hover = styled.h1`
    transition: all 1s;
    :hover {
      border-color: #333;
      text-shadow: 1px 1px 2px #000000;
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
  margin: '40px';
  text-shadow: 1px 1px px #000000;
  border: '5px solid pink'
  transition: all 1s;
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
           
      }

`
const Header = () => {
  return (
    <div>
      <div className="row">
          
          <img className="w-120 col " src="/img/famille.jpeg" style={{width: "45%","margin": "auto"}} />
          <H1hover className="col text-success"><i className='fas fa-fire-alt' style={{"fontSize":"48px"}}></i> Mes projets vous propose une Prime pour vos travaux de rénovation énergétique.
N’attendez-plus: Faites une
simulation ! </H1hover>
          </div>
          <div class="row">
            <DivHover className={' jumbotron alert-primary col text-center text-secondary  m-4 shadow-lg '}  
             id="div1" ><i class="fas fa-file-alt" style={{"fontSize":"36px"}}></i><h3>Notre Démarche</h3></DivHover>
            <DivHover className={'jumbotron alert-danger col text-center text-secondary  m-4 shadow-lg '}><i class="far fa-money-bill-alt" style={{"fontSize":"36px"}}></i><h3>Simulez votre prime </h3> </DivHover>
            <DivHover className={'jumbotron alert-success col text-center text-secondary m-4 shadow-lg '}><i class=" far fa-id-card" 
            style={{"fontSize":"36px"}}></i><h3>Inscrivez vous</h3></DivHover>
            <DivHover className={'jumbotron alert-dark col text-center text-secondary m-4 shadow-lg '}><i class="fas fa-eye" style={{"fontSize":"36px"}}></i><h3>Infos</h3></DivHover>
           </div>
    </div>
  )
}

const Footer = () => {
  return (
    <div>
       <div class="row">
            <DivHover className="col text-center jumbotron alert-info m-1 shadow-lg"><i class="fas fa-question" style={{"fontSize":"36px"}}></i> Une question</DivHover>
            <DivHover className="col text-center jumbotron alert-success m-1 shadow-lg"><i class="fas fa-pencil-alt" style={{"fontSize":"36px"}}></i> inscription gratuite</DivHover>
            <DivHover className="col text-center jumbotron alert-danger m-1 shadow-lg"><i class="fas fa-home" style={{"fontSize":"36px"}}></i>+ de 15 travaux élegibles</DivHover>
            <DivHover className="col text-center jumbotron alert-dark m-1 shadow-lg"><i class="far fa-money-bill-alt" style={{"fontSize":"36px"}}></i> jusqu'à 400€ remboursés</DivHover>
        </div> 
       
    </div>
  )
}

const Midle = () => {
  return (
    <div>
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
    </div>
  )
}

    return (
        <div action="#top">
            <h1> Économisez <span className="text-primary"> votre énergie</span>  et <span className="text-primary"> votre argent</span> en rénovant votre logement ! </h1>
        <Header/>
          
         <br></br>
        <Midle/>
          <br></br>

        <Mapimage class="container">
           <img className="w-120 col " src="/img/econrj.jpeg" style={{width: "100%","margin": "auto"}} />
            <div className="bottom-left"><h2>Bottom Left</h2></div>
            <div className="top-left"><h2>Top Left</h2></div>
            <div className="top-right"><h2>Top Right</h2></div>
            <div className="bottom-right"><h2>Bottom Right</h2></div>
            <div className="centered"><h2>Centered</h2></div>
        </Mapimage> 
          <br></br>
        <Footer/>
    { scrolly > 600 ? <Topbtn className={`btn btn-outline-dark`}  href="#top"><h2>Haut</h2></Topbtn> : '' }

        </div>
      );
  }

  export default Home;
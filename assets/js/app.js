import React, { Component,useState,useEffect,useCallback } from 'react';
import ReactDOM from 'react-dom';
import 'bootstrap/dist/css/bootstrap.min.css';
import raw from './airtable.json'
import qr from './services/QueryService'
import Menu from './Menu';
import Tableau from './Tableau'
import axios from 'axios';
import {Strelement,Urlelement,Titlelelement,Imgelement,Btnelement} from './Element'
import Cards from './Cards'
import Home from './Home'
import Form from './Form'
import {
  BrowserRouter as Router,
  Redirect,
  
} from "react-router-dom";
import Button from 'react-bootstrap/Button';


class App extends React.Component {
   
    constructor() {
        super();
     
        this.state = { 
          user:'',
          role:'',
          url:'',
          menus: [],
          menu : '',
          name :'',
          ssm : [],
          data : [],
          fieldq: [],
          qchamps : [],
          listchmp: [],
          ongquery : "",
        }

        
      }
// execution de la requette preparé dans la fonction ts avec trois pramettres  id du type de requette , li
      gettree = (id,list,itemq,filter) => {
        let finalquery =""
        let key = raw.key
         if(itemq === "noquery"){
           return;
         }
        let headers = {
         
          'Authorization': `Bearer ${key}` 
        }
        
        let  url1 = localStorage.getItem("url")
           url1 =    url1+'/api/graphql'   
         let method 
        switch(id){
          case 1 : 
            finalquery =  qr.genQuery;
            method ='post'
            break;
          case 2:
            finalquery = list;  
            method ='post'
            break;
          case 3:
              url1 = raw.url 
              url1 = url1.concat(filter)
              finalquery = '{}';  
              method ='get'
              break;
              
          case 4:
                url1 = raw.url1  
                finalquery = '{}';  
                method ='get'
                break; 
          case 5 : 
                finalquery =  itemq;
                method ='post'
              break;                     
          }
         
               axios({
                 url: url1,
                 method: method,
                 headers: headers,
                 data: {
                   query: finalquery
                 }
               }).then((result) => {
                switch(id){
                  case 1 : 
                    const menus = result.data.data.menus.edges;
                    this.setState({ menus });
                    localStorage.setItem('menus', JSON.stringify(menus));
                  break;
                  case 2:
                    let x = itemq
                    let data = result.data.data[x].edges;
                    this.setState({ data });
                  break;  
                  case 3:
                    let x1 = itemq
                    const data1 = result.data.records ;
                    let reduc1 = []
                    let temp = []
                    data1.forEach(element => {
                     //temp.push(element.fields)
                     reduc1.push({node: element.fields});    
                    });
                    data = reduc1   
                    //console.log(reduc1)
                    this.setState({ data });
                  break; 
                  case 4:
                    let x2 = itemq
                    const data2 = result.data.records ;
                    let reduc2 = []
                    let temp1 = []
                    data2.forEach(element => {
                     //temp.push(element.fields)
                     reduc2.push({node: element.fields});    
                    });
                    data = reduc2  
                    //console.log(reduc1)
                    this.setState({ data });
                  break;  
                  case 5:
                    let x4 = list
                    console.log(result.data.data)
                    console.log(x4)
                    let data4 = result.data.data[x4].edges;
                    this.setState({ fieldq:data4 });
                  break;  
                }

               });
      }
      
//function que permet de faire une requete simple à l'api
    simpleFildQuery = (champs) => {

        //jsondata = JSON.parse(champs)  
 const test = champs.split('{')
    
this.gettree(5,test[1].trim(),champs,"nofilter");
    }


//function que recupere info du menu tels que : sousmenu , construit la requete a éffecuter dans l'pi graphql ( les champs à afficher) et les met dans l'état react
     tst= (ssm,urlp)=> {
      window.history.pushState('page2', 'Title', urlp);
      
      this.setState({ ssm });
      if(ssm)
      {
        localStorage.setItem('ssm', JSON.stringify(ssm));
      } 
      let qchamps = []
      let query = ""  
      let filter = "" 
    for (let [key, value] of Object.entries(ssm)) {
      qchamps = value.onglet.edges[0].node.champs.edges
      query = value.onglet.edges[0].node.ongsql
      filter = value.onglet.edges[0].node.ongcom
     
    }
    this.setState({ qchamps });
 
    const result = qchamps.filter(word => word.node.chprec > 0); 
    let listchmp =[]
    result.forEach(element => {
     listchmp.push(element.node.chpcha)
    });
   
    this.setState({ listchmp });
     const ongquery = qr.list(listchmp,query)
     this.setState({ ongquery });
     // definir dams admin ssmenu sscom le type de requete pour le sous menu 
    
     this.gettree(parseInt(ssm.node.ssmcom),ongquery,query,filter) 
    }

    //function que initialise les params de 'url suita à click dans menu
    urlresolver = () => {
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString)
      const menu = urlParams.get('name')
      this.setState({menu})
      const ssmlib = urlParams.get('ssm')
      const localssm = JSON.parse(localStorage.getItem("ssm"))
     if(this.state.data.length==0 && localssm){
       this.tst(localssm,queryString)
     }

    }

 // initialisatation de l'app en recuperant les donnée du local starage 

    initapp = () => {
    const    url = localStorage.getItem("url")
      this.setState({url})
      const    user = localStorage.getItem("username")
      this.setState({user})
      const    role = localStorage.getItem("role")
      this.setState({role})
      
    }

    // initialisation ds elemens react js
    componentDidMount() {
       this.initapp()   
       this.gettree(1) 
       this.urlresolver()
      
      }
      

  
  render() {
     // const ttl = <h1>title</h1>
     // const arr = [ <Imgelement img="/img/85cd8e466d3a38f2c645a6ba23f51b21.jpeg" class="bg-info"/>, <Imgelement img="/img/85cd8e466d3a38f2c645a6ba23f51b21.jpeg" class="bg-info"/>]
     // arr.push(ttl)
  
      return (
        <div className="alert-info">
          <Menu handler = {this.tst} user={this.state.user? this.state.user:''} menus={this.state.menus}  />
        
          <br></br>
      <Router>
        <div className="container bg-ligth">
         <QueryParam ssm={this.state.ssm} simplequery={this.simpleFildQuery} simplequerydata={this.state.fieldq} menus={this.state.menus} getData={this.state.data}/>
         <br></br>
        </div>

      </Router>

      <footer className="footer bg-light font-small blue ">

<div className="footer-copyright text-center py-3">© 2020 Copyright:
  <a href="https://MesProjets.com/">MesProjets.com</a>
</div>

</footer>
        </div>
      );
    }

  
  }

// routage de l'application suivant l'url param name , recuperation des champs definis dans l'admin : ong et des données à afficher : data 
  function QueryParam(props) {
    const simplequery=props.simplequery 
    const fild_data = props.simplequerydata
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString)
    const menu = urlParams.get('name')
    const ssm = props.ssm
    let ong = []
    let data = []
    data = props.getData
   
    for (let [key, value] of Object.entries(ssm)) {

      ong = value.onglet.edges[0].node.champs.edges
    }

   
    const Child = props => 
     <div>
    {menu ? (
   renderSwitch(menu,ong,data,simplequery,fild_data)
    )
     :
    (
      <Home/>
    )}
  </div>;

    return (
      <div >
     
        <Child/>
        
      </div>
    );
  }
// rendu de l'affichage suivant le param name de l'url 
  function renderSwitch(param,ong,data1,simplequery,fild_data) {
    
    const result = ong.filter(word => word.node.chprec > 0); 
    let reduc = []
    let listchmp =[]
    result.forEach(element => {
    
     reduc.push({Header: element.node.chplib,accessor:element.node.chplib});    
     listchmp.push(element.node.chplib)
    });
    let nodedata = []
    data1.forEach(element => {
        nodedata.push(element.node)
    });   
    

    const columns = React.useMemo(
      () => reduc,
      []
      )
      
      const data = React.useMemo(
        () => nodedata,
        []
        )
    switch(param) {
      case 'home':
       
        return <Home/>;
        break;
 
      case 'recherche':
       
        return <Tableau columns={columns} data={data}/>;
        break;  
      case 'cards':
       
        return <Cards  columns={result} data={data}/>;
        break;   
        case 'privé':
       
          return <Users/>;
          break;       
       case 'form':
       
         return <Form  columns={result} simplequery={simplequery} />;
       break;                
    }
  }

 


  function Users() {
    return <h2>Users</h2>;
  }
  
  
 

  ReactDOM.render(
    <App />,
    document.getElementById('root')
  );
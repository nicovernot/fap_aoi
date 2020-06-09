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
          qchamps : [],
          listchmp: [],
          ongquery : "",
        }

        
      }

      gettree = (id,list,itemq) => {
        let finalquery =""
        let key = raw.key
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
              const key = raw.key
              finalquery = '{}';  
              let headers = {
               
                'Authorization': `Baerer ${raw.key}̀`             }
              method ='get'
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
                    console.log(data)
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
                }

               });
      }
      

     tst= (ssm,urlp)=> {
      window.history.pushState('page2', 'Title', urlp);
      
      this.setState({ ssm });
      if(ssm)
      {
        localStorage.setItem('ssm', JSON.stringify(ssm));
      } 
      let qchamps = []
      let query = ""  
    for (let [key, value] of Object.entries(ssm)) {
      qchamps = value.onglet.edges[0].node.champs.edges
      query = value.onglet.edges[0].node.ongsql
    
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
    
     this.gettree(parseInt(ssm.node.ssmcom),ongquery,query) 
    }

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

 

    initapp = () => {
    const    url = localStorage.getItem("url")
      this.setState({url})
      const    user = localStorage.getItem("username")
      this.setState({user})
      const    role = localStorage.getItem("role")
      this.setState({role})
      console.log(raw.key)
    }
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
        <div className="bg-alert">
          <Menu handler = {this.tst} menus={this.state.menus}  />
        

      <Router>
        <div className="container">
         <QueryParam ssm={this.state.ssm}  menus={this.state.menus} getData={this.state.data}/>
        
        </div>
      </Router>

     
        </div>
      );
    }

  
  }


  function QueryParam(props) {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString)
    const menu = urlParams.get('name')
    const ssm = props.ssm
    let ong = []
    let data = []
    data = props.getData
    console.log(data)
    for (let [key, value] of Object.entries(ssm)) {
      console.log(value.onglet.edges[0].node.champs.edges)
      ong = value.onglet.edges[0].node.champs.edges
    }

   
    const Child = props => 
     <div>
    {menu ? (
   renderSwitch(menu,ong,data)
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

  function renderSwitch(param,ong,data1) {
    
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
    
    console.log(data1)

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
    }
  }

 

 

  ReactDOM.render(
    <App />,
    document.getElementById('root')
  );
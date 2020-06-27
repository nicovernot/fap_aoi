
import React, { useState,Component } from 'react';
import Nav from 'react-bootstrap/Nav';
import NavDropdown from 'react-bootstrap/NavDropdown';
import Navbar from 'react-bootstrap/Navbar'
import Form from 'react-bootstrap/Form'
import FormControl from 'react-bootstrap/FormControl'
import Button from 'react-bootstrap/Button'

import {
  
  Link,
} from "react-router-dom";

function Menu(props)  {
  const menus = props.menus;
  const user = props.user
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString)
  const menu_url = urlParams.get('men')

  const listItems = menus.map((men) =>    
  men.node.ssmenus.edges.length > 0 ?
  user !="" || men.node.public==true ? ( <NavDropdown className={ menu_url===men.node.menlib ? "alert-info":`alert-secondary`}  title={men.node.mencom} key={men.node.id} id="nav-dropdown">
         
          {men.node.ssmenus.edges.map((ssm) => <NavDropdown.Item id={"ssm"+ssm.node.ssmlib}   onClick = {(e) => props.handler(ssm,`?name=${ssm.node.ssmphp}&ssm=${ssm.node.ssmlib}&men=${men.node.menlib}`)} key={ssm.node.id}>{ssm.node.ssmlib}</NavDropdown.Item>) }
    </NavDropdown> ) : ""
     : 
    user !="" || men.node.public==true ?
    (<Nav.Item key={men.node.id} >
        <Nav.Link className={ menu_url===men.node.menlib ? "alert-info":`alert-secondary`} href={"?name="+men.node.menphp+"&men="+men.node.menlib} key={men.node.mencom} > 
         {men.node.mencom}
        </Nav.Link>
    </Nav.Item> ):""   );
     
    
        return (
         

<Navbar bg="light" expand="lg" className="fill tabs sticky-top lead">
<Navbar.Brand className={ menu_url==='home' ? "alert-info":`alert-secondary`} href="/?name=home&men=home "><i className='fas fa-leaf' style={{'fontSize':'36px'}}></i>Mes projets </Navbar.Brand>
<Navbar.Toggle aria-controls="basic-navbar-nav" />
<Navbar.Collapse id="basic-navbar-nav">
<Nav className="mr-auto" defaultActiveKey="/home" as="ul">

          {listItems}
          </Nav>
  <Form  inline>
    <FormControl type="text" placeholder="Recherche" className="mr-sm-2" />
    <Button variant="outline-success">recherche</Button>
  </Form>
 { user != "" ? 
  <Nav.Item>
  <Nav.Link href="/logout" onClick={e =>localStorage.removeItem('username')}> 
  Se Deconnecter
  </Nav.Link>
</Nav.Item>:
""
 }
</Navbar.Collapse>
</Navbar>
          );
    
}
 
export default Menu;
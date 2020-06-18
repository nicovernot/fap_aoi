
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

  const listItems = menus.map((men) =>    
  men.node.ssmenus.edges.length > 0 ?
    
    ( <NavDropdown title={men.node.mencom} key={men.node.id} id="nav-dropdown">
         
          {men.node.ssmenus.edges.map((ssm) => <NavDropdown.Item  onClick = {(e) => props.handler(ssm,`?name=${ssm.node.ssmphp}&ssm=${ssm.node.ssmlib}&men=${men.node.mencom}`)} key={ssm.node.id}>{ssm.node.ssmlib}</NavDropdown.Item>) }
    </NavDropdown> )
     : 
    (<Nav.Item>
        <Nav.Link href={"?name="+men.node.menphp} key={men.node.mencom} > 
         {men.node.mencom}
        </Nav.Link>
    </Nav.Item> ));

    
        return (
         

<Navbar bg="light" expand="lg" className="justify-content-between sticky-top lead">
<Navbar.Brand className="alert-secondary" href="#home"><i class='fas fa-leaf' style={{'font-size':'36px'}}></i>Mes projets </Navbar.Brand>
<Navbar.Toggle aria-controls="basic-navbar-nav" />
<Navbar.Collapse id="basic-navbar-nav">
<Nav defaultActiveKey="/home" as="ul">
              <Nav.Item>
           <Nav.Link href="/">home </Nav.Link>
             </Nav.Item>
          {listItems}
          </Nav>
  <Form inline>
    <FormControl type="text" placeholder="Search" className="mr-sm-2" />
    <Button variant="outline-success">Search</Button>
  </Form>
</Navbar.Collapse>
</Navbar>
          );
    
}
 
export default Menu;
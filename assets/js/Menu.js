
import React, { useState,Component } from 'react';
import Nav from 'react-bootstrap/Nav';
import NavDropdown from 'react-bootstrap/NavDropdown';
import Navbar from 'react-bootstrap/Navbar'
import {
 
  Link,
 
} from "react-router-dom";
function Menu(props)  {
  const menus = props.menus;
  

const listItems = menus.map((men) =>    
    men.node.ssmenus.edges.length > 0 ?
    
    ( <NavDropdown title={men.node.mencom} key={men.node.id} id="nav-dropdown">
         
          {men.node.ssmenus.edges.map((ssm) => <NavDropdown.Item  to="/?name=recherche"  onClick = {(e) => props.handler(ssm)} key={ssm.node.id}>{ssm.node.ssmlib}</NavDropdown.Item>) }
    </NavDropdown> )
     : 
    (<Nav.Item>
        <Nav.Link key={men.node.mencom} > 
          {men.node.mencom}
        </Nav.Link>
    </Nav.Item> ));

    
        return (
          <Nav defaultActiveKey="/home" as="ul">
              <Nav.Item>
           <Nav.Link href="/">home</Nav.Link>
             </Nav.Item>
          {listItems}
          </Nav>
          );
    
}
 
export default Menu;
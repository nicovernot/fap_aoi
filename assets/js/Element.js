import React, { Component } from 'react';

function Strelement(props) {
   
const se = <p className={props.class}>{props.label}t</p>
return (
    <div>
        {se}
    </div>
    );
}

function Urlelement (props) {
   
const ue = <a href={props.url} className={props.class}>{props.label}t</a>
return (
    <div>
        {ue}
    </div>
    );
}

function Titlelelement (props) {
   
    const ue = <h1  className={props.class}>{props.label}t</h1>
    return (
        <div>
            {ue}
        </div>
        );
    }


    function Imgelement (props) {
   
        const ue = <img src={props.src} className={props.class}/>
        return (
            <div>
                {ue}
            </div>
            );
    }

    function Btnelement (props) {
   
            const ue = <button onClick={props.action} className={props.class}>{props.label}</button>
            return (
                <div>
                    {ue}
                </div>
                );
     }

    

export {Strelement,Urlelement,Titlelelement,Imgelement,Btnelement};
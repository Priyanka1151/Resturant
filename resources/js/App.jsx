// resources/js/App.jsx
import React from 'react';
import ReactDOM from 'react-dom';
// import { createRoot } from 'react-dom/client'

export default function FirstReact(){ 
    return(
        <h1>How To Install React in Laravel 9 with Vite priyanka</h1>
    );
}

if(document.getElementById('demo-react')){
    // ReactDOM.render(<FirstReact/>,document.getElementById('demo-react'));
    createRoot(document.getElementById('demo-react')).render(<FirstReact />)
}
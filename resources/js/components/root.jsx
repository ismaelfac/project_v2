import React, { Component } from "react";
import { Route, Redirect, Switch } from 'react-router-dom';
import { saveState } from '../redux/store';
//************ Components   ********************/
import Roles from './panel/dashboard';

class Root extends Component{
    
    componentDidMount() {
        window.addEventListener('unload', saveState)
    }
    render() {
        return (
            <Switch>
                <Route path="/roles" component={Roles}/>
                <Redirect from="/" to="/roles" />
            </Switch> 
        );
    }
}

export default Root;
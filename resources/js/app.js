import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';
import { BrowserRouter } from 'react-router-dom';
import store from './redux/store';
import Root from "./components/root";

class App extends Component {
    
    render(){
        return (
            <Provider store={store}>
                <BrowserRouter>
                    <Root />
                </BrowserRouter>
            </Provider>
        );
    }
}

ReactDOM.render(<App />, document.getElementById('app'));

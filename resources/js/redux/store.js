import {createStore, combineReducers } from 'redux';
import roles from "./reducers/roles";

const reducer = combineReducers({
    roles
});

const globalState = localStorage.getItem('GLOBAL_STATE');
const initialState = globalState ? JSON.parse(globalState): undefined;
const store = createStore(reducer, initialState);

/* Rehidratando el estado al reiniciar la aplicación */
export const saveState = () => {
    const state = store.getState()
    localStorage.setItem('GLOBAL_STATE',JSON.stringify(state));
}

export default store;
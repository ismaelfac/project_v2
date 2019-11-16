import { handleActions } from "redux-actions";
import { getRoles } from "../actions/roles";
import routes from "../../services/api";

export default handleActions({
    [getRoles]: (action) => {
        console.log('Routes'+routes);
        return action.payload;
    }
}, []);
import React,{ Component, Fragment } from "react";
import { connect } from 'react-redux';
import { withRouter } from 'react-router-dom';
import Page from "./page";

class Roles extends Component{
    render() {
        const {
            roles
        } = this.props;
        return (
            <Fragment>
                <Page roles={roles} />
            </Fragment>
        )
    }
}
const mapStateToProps = state => ({
    roles: state.roles,
    comments: state.comments
});

export default withRouter(
    connect(mapStateToProps)(roles)
);
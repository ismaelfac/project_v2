import React, { Component } from "react";
import { connect } from "react-redux";
import { getRoles } from "../redux/actions/roles";
import Layout from "./layout";

class Roles extends Component {
    state = {};

    componentDidMount() {

    }

    render() {
        return (
            <Layout>
                Root
            </Layout>
        );
    }
}

const mapStateToProps = (state) => {
    return state;
}

export default connect(mapStateToProps)(Roles);
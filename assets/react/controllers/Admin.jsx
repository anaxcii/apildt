import React, {useState} from "react";
import {Navigate} from "react-router-dom";
import {FileField, FileInput} from "react-admin";
import {
    CreateGuesser,
    fetchHydra as baseFetchHydra,
    HydraAdmin,
    hydraDataProvider as baseHydraDataProvider,
    ResourceGuesser,
    useIntrospection,
} from "@api-platform/admin";
import {parseHydraDocumentation} from "@api-platform/api-doc-parser";
import authProvider from "../authProvider";

const getHeaders = () => localStorage.getItem("token") ? {
    Authorization: `Bearer ${localStorage.getItem("token")}`,
} : {};
const fetchHydra = (url, options = {}) =>
    baseFetchHydra(url, {
        ...options,
        headers: getHeaders,
    });
const RedirectToLogin = () => {
    const introspect = useIntrospection();
    if (localStorage.getItem("token")) {
        introspect();
        return <></>;
    }
    return <Navigate to="/login"/>;
};
const apiDocumentationParser = (setRedirectToLogin, entrypoint) => async () => {
    try {
        setRedirectToLogin(false);
        return await parseHydraDocumentation(entrypoint, {headers: getHeaders});
    } catch (result) {
        const {api, response, status} = result;
        if (status !== 401 || !response) {
            throw result;
        }

        // Prevent infinite loop if the token is expired
        localStorage.removeItem("token");

        setRedirectToLogin(true);

        return {
            api,
            response,
            status,
        };
    }
};
const dataProvider = (setRedirectToLogin, entrypoint) => baseHydraDataProvider({
    entrypoint: entrypoint,
    httpClient: fetchHydra,
    apiDocumentationParser: apiDocumentationParser(setRedirectToLogin, entrypoint),
    mercure: true,
    useEmbedded: false,
});

const MediaObjectsCreate = props => (
    <CreateGuesser {...props}>
        <FileInput source="file" name="file">
            <FileField source="src" title="file" />
        </FileInput>
    </CreateGuesser>
);
const Admin = (props) => {
    const [redirectToLogin, setRedirectToLogin] = useState(false);

    return (
            <HydraAdmin dataProvider={dataProvider(setRedirectToLogin, props.entrypoint)} authProvider={authProvider} entrypoint={props.entrypoint} title={"LDT ADMIN"}>
                <ResourceGuesser name="nfts"/>
                <ResourceGuesser name="galleries"/>
                <ResourceGuesser name="users"/>
                <ResourceGuesser name="images" create={MediaObjectsCreate}/>
                <ResourceGuesser name="transactions"/>
            </HydraAdmin>
    );
}
export default Admin;
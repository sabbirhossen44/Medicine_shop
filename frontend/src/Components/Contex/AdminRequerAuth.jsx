import { useContext } from "react"
import { Navigate } from "react-router-dom";
import {AdminAuthContext} from '../Contex/AdminAuth';

export const AdminRequerAuth = ({children}) =>{
    const {user} = useContext(AdminAuthContext);
    if (!user) {
        return <Navigate to="/login"/>
    }
    return children;
}
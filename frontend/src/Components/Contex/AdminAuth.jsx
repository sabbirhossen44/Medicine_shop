import React, { createContext, useState } from "react";

export const AdminAuthContext = createContext();
export const AdminAuthProvider = ({ children }) => {
    const [user, setUser] = useState(() => {
        const storedUser = JSON.parse(localStorage.getItem('adminInfo'));
        return storedUser ? storedUser : false;
    })

    const login = (adminInfo) => {
        localStorage.setItem('adminInfo', JSON.stringify(adminInfo));
        setUser(adminInfo);
    }
    const logout = () => {
        localStorage.removeItem('adminInfo');
        setUser(false);
    }
    return (
        <AdminAuthContext.Provider value={{
            user,
            login,
            logout,
            setUser
        }}>
            { children }
        </AdminAuthContext.Provider>
    )
}
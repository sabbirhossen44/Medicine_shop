import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import App from './App.jsx'
import { ToastContainer } from 'react-toastify';

import {
  createRoutesFromElements,
  createBrowserRouter,
  Route,
  RouterProvider
} from "react-router-dom";
import Login from './Pages/Login.jsx';
import Register from './Pages/Register.jsx';
import { AdminAuthProvider } from './Components/Contex/AdminAuth.jsx';
import Home from './Pages/Home.jsx';
import { AdminRequerAuth } from './Components/Contex/AdminRequerAuth.jsx';
import Root from './Components/Layouts/Root.jsx';

const router = createBrowserRouter(
  createRoutesFromElements(
    <>
      <Route path='/login' element={<Login />} />
      <Route path='/register' element={<Register />} />
      <Route
        path="/"
        element={<Root />}
      >

        <Route index element={<AdminRequerAuth><Home/></AdminRequerAuth>} />

      </Route>

    </>

  )
);

createRoot(document.getElementById('root')).render(
  <>
    <AdminAuthProvider>
      <RouterProvider router={router} />
    </AdminAuthProvider>

    <ToastContainer />
  </>
)

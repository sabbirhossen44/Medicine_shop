import React, { useContext } from 'react'
import loginImg from '../assets/login.jpg';
import { useForm } from "react-hook-form"
import { useNavigate } from 'react-router-dom';
import { toast } from 'react-toastify';
import api from '../Https';
import { AdminAuthContext } from '../Components/Contex/AdminAuth';

const Login = () => {
  const { login } = useContext(AdminAuthContext);
  const nabavigate = useNavigate();
  const {
    register,
    reset,
    handleSubmit,
    formState: { errors },
  } = useForm()

  const onSubmit = async (data) => {
    try {
      const response = await api.post('/customer/login', data);
      toast.success(response.data.message);
      
      reset();
      const adminInfo = {
        token: response.data.token,
        admin: response.data,
      }
      localStorage.setItem('adminInfo', JSON.stringify(adminInfo));
      login(adminInfo);
      setTimeout(() => {
        nabavigate('/');
      }, 2000);

    } catch (error) {
      toast.error(error.response.data.message);
    }
  }
  return (
    <>
      <div className="w-full h-screen flex items-center justify-center ">
        <div className="max-w-5xl mx-auto bg-gray-100 block rounded-lg shadow-lg">
          <div className="w-full flex justify-between gap-3 items-center ">
            <div className="w-1/2">
              <img src={loginImg} alt="" className='w-full rounded-lg block overflow-hidden object-cover  h-full ' />
            </div>
            <div className="w-1/2 px-5 py-10">
              <form onSubmit={handleSubmit(onSubmit)} className="w-full">
                <div className="mb-4">
                  <label className="block text-gray-700 text-lg font-bold mb-2" htmlFor="username">
                    Email
                  </label>
                  <input
                    {...register('email', {
                      required: 'Email is required',
                      pattern:
                      {
                        value: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                        message: 'Invalid email format'
                      }
                    })}
                    type="email"
                    placeholder="Enter your username"
                    className="shadow appearance-none border rounded w-full py-3 px-4 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  />
                  {errors.email && <p className='text-red-500 text-sm'>{errors.email.message}</p>}
                </div>
                <div className="mb-4">
                  <label className="block text-gray-700 text-lg font-bold mb-2" htmlFor="username">
                    Password
                  </label>
                  <input
                    {...register('password', {
                      required: 'Password is required',
                    })}
                    type="password"
                    placeholder="Enter your password"
                    className="shadow appearance-none border rounded w-full py-3 px-4 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  />
                  {errors.password && <p className='text-red-500 text-sm'>{errors.password.message}</p>}
                </div>
                <div className="mb-4">
                  <button
                    type="submit"
                    className='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-5 text-lg rounded focus:outline-none focus:shadow-outline'
                  >Login</button>
                </div>
                <h4 className='text-secondary'>Don't have an account? <span className='text-green-600 cursor-pointer' onClick={() => nabavigate('/register')}>Create free account</span></h4>
              </form>
            </div>
          </div>
        </div>
      </div>
    </>
  )
}

export default Login
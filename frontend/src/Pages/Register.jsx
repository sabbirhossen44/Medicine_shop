import React from 'react'
import loginImg from '../assets/login.jpg';
import { useForm } from "react-hook-form"
import { useNavigate } from 'react-router-dom';
import api from '../Https';
import { toast } from 'react-toastify';

const Register = () => {
    const nabavigate = useNavigate();
    const {
        register,
        handleSubmit,
        reset,
        formState: { errors },
    } = useForm()
    const onSubmit = async (data) => {
        try {
            const response = await api.post('/customer/register', data);
            reset();
            toast.success(response.data.message);
            setTimeout(() => {
                nabavigate('/login');
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
                                        User Name
                                    </label>
                                    <input
                                        {...register('name', {
                                            required: 'Name is required',
                                        })}
                                        type="text"
                                        placeholder="Enter your username"
                                        className="shadow appearance-none border rounded w-full py-3 px-4 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    />
                                    {errors.name && <p className='text-red-500 text-sm'>{errors.name.message}</p>}
                                </div>
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
                                            minLength: {
                                                value: 6,
                                                message: 'Password must be at least 6 characters'
                                            }
                                        })}
                                        type="password"
                                        placeholder="Enter your password"
                                        className="shadow appearance-none border rounded w-full py-3 px-4 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    />
                                    {errors.password && <p className='text-red-500 text-sm'>{errors.password.message}</p>}
                                </div>
                                <div className="mb-4">
                                    <label className="block text-gray-700 text-lg font-bold mb-2" htmlFor="username">
                                        Confirm Password
                                    </label>
                                    <input
                                        {...register('confirm_password', {
                                            required: 'Please confirm your password',
                                            validate: (value, context) =>
                                                value === context.password || 'Passwords do not match'
                                        })}
                                        type="password"
                                        placeholder="Enter your password"
                                        className="shadow appearance-none border rounded w-full py-3 px-4 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    />
                                    {errors.confirm_password && <p className='text-red-500 text-sm'>{errors.confirm_password.message}</p>}
                                </div>
                                <div className="mb-4">
                                    <button
                                        type="submit"
                                        className='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-5 text-lg rounded focus:outline-none focus:shadow-outline'
                                    >Register</button>
                                </div>
                                <h4 className='text-secondary'>Already have an account? <span className='text-green-600 cursor-pointer' onClick={() => nabavigate('/login')}>Login</span></h4>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}

export default Register
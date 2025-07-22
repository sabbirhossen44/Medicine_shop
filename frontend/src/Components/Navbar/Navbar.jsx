import React, { useEffect, useState } from 'react'
import logo360 from '../../assets/logo360.jpg';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faKeyboard, faReceipt, faPersonWalkingArrowLoopLeft, faClock, faPenToSquare, faArrowRightFromBracket, faNotesMedical } from '@fortawesome/free-solid-svg-icons';
import LiveClock from './LiveClock';
import { useContext } from 'react';
import { AdminAuthContext } from '../../Components/Contex/AdminAuth'
import { toast } from 'react-toastify';

const Navbar = () => {
    const { user , logout } = useContext(AdminAuthContext);
    const [customerName, setCustomerName] = useState('');
    useEffect(() => {
        if (user && user.admin && user.admin.customer) {
            setCustomerName(user.admin.customer.name); 
        } else {
            setCustomerName('Sabbir Hossen');
        }
    }, [user]);
    const exit = () =>{
        logout();
        toast.success('Logout Successfully!');
    }
    return (
        <>
            <div className="sticky top-0 z-50 w-full">
                <div className="bg-slate-50 py-4 px-6 shadow-lg">
                    <div className="flex items-center justify-between">
                        <div className="flex items-center gap-5">
                            <div className="mr-4">
                                <img src={logo360} alt="" />
                            </div>
                            <div className="">
                                <FontAwesomeIcon icon={faKeyboard} className='size-6 text-gray-600 border rounded-full px-4 py-2 border-gray-500 cursor-pointer hover:text-yellow-500 hover:border-yellow-500 transition duration-300 ease-in-out' />
                            </div>
                            <div className="">
                                <LiveClock />
                            </div>
                        </div>


                        <div className="flex items-center gap-5">
                            <div className="text-gray-600 border rounded-full text-md px-4 py-2 border-gray-500 cursor-pointer hover:text-yellow-500 hover:border-yellow-500 transition duration-300 ease-in-out flex items-center gap-2">
                                <span>
                                    <FontAwesomeIcon icon={faReceipt} className='size-5' />
                                </span>
                                <span>Report</span>
                            </div>
                            <div className="text-gray-600 border rounded-full text-md px-4 py-2 border-gray-500 cursor-pointer hover:text-yellow-500 hover:border-yellow-500 transition duration-300 ease-in-out flex items-center gap-2">
                                <span>
                                    <FontAwesomeIcon icon={faPersonWalkingArrowLoopLeft} className='size-5' />
                                </span>
                                <span>Return</span>
                            </div>
                            <div className="text-gray-600 border rounded-full text-md px-4 py-2 border-gray-500 cursor-pointer hover:text-yellow-500 hover:border-yellow-500 transition duration-300 ease-in-out flex items-center gap-2">
                                <span>
                                    <FontAwesomeIcon icon={faClock} className='size-5' />
                                </span>
                                <span>Recent</span>
                            </div>
                            <div className="text-gray-600 border rounded-full text-md px-4 py-2 border-gray-500 cursor-pointer hover:text-yellow-500 hover:border-yellow-500 transition duration-300 ease-in-out flex items-center gap-2">
                                <span>
                                    <FontAwesomeIcon icon={faPenToSquare} className='size-5' />
                                </span>
                                <span>Draft (0)</span>
                            </div>
                        </div>



                        <div className="flex items-center gap-5 justify-center">
                            <div className="text-gray-600 border rounded-full text-md px-4 py-2 border-gray-500 cursor-pointer hover:text-yellow-500 hover:border-yellow-500 transition duration-300 ease-in-out flex items-center gap-2 ">
                                <span>
                                    <FontAwesomeIcon icon={faNotesMedical} className='size-5' />
                                </span>
                                <span>Screen</span>
                            </div>
                            <div className="text-gray-600 border rounded-full text-lg px-5 py-2 border-gray-500 cursor-pointer hover:text-yellow-500 hover:border-yellow-500 transition duration-300 ease-in-out flex items-center gap-2 justify-center bg-green-700">
                                {/* <span>
                                    <FontAwesomeIcon icon={faPersonWalkingArrowLoopLeft} className='size-6' />
                                </span>
                                <span>Return</span> */}
                                <span className='text-xl font-bold text-white uppercase'>{customerName.charAt(0)}</span>
                            </div>

                            <div className="text-red-600 border rounded-full text-md px-4 py-2 border-red-500 cursor-pointer hover:text-red-500 hover:border-red-500 transition duration-300 ease-in-out flex items-center gap-2" onClick={exit}>
                                <span>
                                    <FontAwesomeIcon icon={faArrowRightFromBracket} className='size-5' />
                                </span>
                                <span>Exit</span>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </>
    )
}

export default Navbar
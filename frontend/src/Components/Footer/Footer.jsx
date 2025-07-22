import React from 'react'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faBangladeshiTakaSign } from '@fortawesome/free-solid-svg-icons';
import { AiFillCalculator  } from "react-icons/ai";
import { FaChevronRight } from "react-icons/fa6";



const Footer = () => {
    return (
        <>
            <div className="mx-5 fixed bottom-0 left-0 right-0 bg-slate-50 py-2 px-6 shadow-md border rounded-md border-gray-200">
                <div className="flex items-center justify-between">
                    <div className="text-white bg-red-500 text-xl px-10 py-4 rounded-xl cursor-pointer hover:bg-red-600 transition duration-300 ease-in-out">
                        <span>Reset</span>
                    </div>
                    <div className="text-white bg-indigo-500 text-xl px-10 py-4 rounded-xl cursor-pointer hover:bg-indigo-600 transition duration-300 ease-in-out">
                        <span>Add.info</span>
                    </div>
                    <div className="text-white bg-[#ce009c]/70 text-xl px-10 py-4 rounded-xl cursor-pointer hover:bg-[#ce009c] transition duration-300 ease-in-out">
                        <span>Discount</span>
                    </div>
                    <div className="text-white bg-amber-500 text-xl px-10 py-4 rounded-xl cursor-pointer hover:bg-amber-600 transition duration-300 ease-in-out">
                        <span>Draft</span>
                    </div>
                    <div className="text-black bg-gray-100 shadow-md border-gray-100 px-20 py-1 rounded-xl cursor-pointer hover:bg-amber-600 transition duration-300 ease-in-out flex flex-col items-center">
                        <span clssName='text-md'>Total</span>
                        <span className="font-bold text-2xl flex items-center gap-1">1000 <FontAwesomeIcon icon={faBangladeshiTakaSign} className='size-5'/></span>
                    </div>
                    <div className="text-white bg-gray-500 text-xl px-10 py-2 rounded-xl cursor-pointer hover:bg-gray-600 transition duration-300 ease-in-out">
                        <span ><AiFillCalculator  className='text-5xl '/></span>
                    </div>
                    <div className="text-white bg-green-700 text-xl px-20 py-5 rounded-xl cursor-pointer hover:bg-green-800 transition duration-300 ease-in-out">
                        <div className="flex items-center justify-center gap-1">
                            <span>Payment</span>
                            <FaChevronRight  className=''/>
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}

export default Footer
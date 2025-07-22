import React from 'react'
import { AiOutlineScan } from "react-icons/ai";

const Scan = () => {
    return (
        <>
            <div className="p-4 w-full border-b-2 border-gray-200">
                <div className="w-full">
                    <form>
                        <div className="flex items-center bg-white rounded-xl shadow-sm border border-gray-200 px-4 py-3 gap-1">
                            <AiOutlineScan className=" text-gray-500 text-2xl" />
                            <input type="search"
                                className='w-full outline-none bg-transparent border-none text-gray-500 pl-2'
                                placeholder='Scan barcode, product code'
                            />
                        </div>
                    </form>
                </div>
            </div>
        </>
    )
}

export default Scan
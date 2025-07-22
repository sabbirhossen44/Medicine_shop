import React from 'react'
import Search from '../Search/Search'
import Category from '../Category/Category'
import AllProduct from '../Product/AllProduct'
import Scan from '../Scan/Scan'
import Cart from '../Cart/Cart'

const Shop = () => {
    return (
        <>
            <div className="mx-6">
                <div className="grid grid-cols-2 gap-4 h-3 w-full">
                    <div className="bg-slate-50 shadow-lg h-[62%] ">
                        <Search />
                        <div className="flex py-5 h-[88%] overflow-y-scroll">
                            <div className="w-1/6">
                                <Category />
                            </div>
                            <div className="w-5/6 ">
                                <AllProduct />
                            </div>
                        </div>
                    </div>
                    <div className="bg-slate-50 shadow-lg h-[62%] ">
                        <Scan/>
                        <Cart/>
                    </div>
                    
                </div>
            </div>
        </>
    )
}

export default Shop
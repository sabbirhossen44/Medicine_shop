import React from 'react'
import { FaChevronDown } from "react-icons/fa";
import photo from '../../assets/medicine.jpg'

const AllProduct = () => {
    const brands = [
        { id: 1, name: 'Brand A' },
        { id: 2, name: 'Brand B' },
        { id: 3, name: 'Brand C' },
        { id: 4, name: 'Brand D' },
    ]
    const products = [
        { id: 1, name: 'Product 1', description: 'Description of Product 1', price: 19.99, photo: photo, stock: 150  , discoutn: 5},
        { id: 2, name: 'Product 2', description: 'Description of Product 2', price: 29.99, photo: photo, stock: 0  , discoutn: 5},
        { id: 3, name: 'Product 3', description: 'Description of Product 3', price: 39.99, photo: photo, stock: 150  , discoutn: 5},
        { id: 4, name: 'Product 4', description: 'Description of Product 4', price: 49.99, photo: photo, stock: 0  , discoutn: 0},
        { id: 5, name: 'Product 5', description: 'Description of Product 5', price: 59.99, photo: photo, stock: 150 , discoutn: 0 },
        { id: 1, name: 'Product 1', description: 'Description of Product 1', price: 19.99, photo: photo, stock: 150  , discoutn: 5},
        { id: 2, name: 'Product 2', description: 'Description of Product 2', price: 29.99, photo: photo, stock: 0  , discoutn: 5},
        { id: 3, name: 'Product 3', description: 'Description of Product 3', price: 39.99, photo: photo, stock: 150  , discoutn: 5},
        { id: 4, name: 'Product 4', description: 'Description of Product 4', price: 49.99, photo: photo, stock: 0  , discoutn: 0},
        { id: 5, name: 'Product 5', description: 'Description of Product 5', price: 59.99, photo: photo, stock: 150 , discoutn: 0 },
        { id: 1, name: 'Product 1', description: 'Description of Product 1', price: 19.99, photo: photo, stock: 150  , discoutn: 5},
        { id: 2, name: 'Product 2', description: 'Description of Product 2', price: 29.99, photo: photo, stock: 0  , discoutn: 5},
        { id: 3, name: 'Product 3', description: 'Description of Product 3', price: 39.99, photo: photo, stock: 150  , discoutn: 5},
        { id: 4, name: 'Product 4', description: 'Description of Product 4', price: 49.99, photo: photo, stock: 0  , discoutn: 0},
        { id: 5, name: 'Product 5', description: 'Description of Product 5', price: 59.99, photo: photo, stock: 150 , discoutn: 0 },
    ]
    return (
        <>
            <div className="mx-5">
                <div className="flex justify-between items-center">
                    <div className="text-xl">Total Medicine(50)</div>
                    <div className="">
                        <select className="rounded p-2 outline-none border-none text-teal-600 bg-slate-50 text-md cursor-pointer">
                            <option value="default" className='text-teal-600'>Select Brand <span><FaChevronDown /></span></option>
                            {brands.map((brand) => (
                                <option key={brand.id} value={brand.name} className='outline-none border-none text-black'>{brand.name}</option>
                            ))}
                        </select>
                    </div>
                </div>
                <div className="">
                    <div className="grid grid-cols-3 gap-4 mt-5">
                        {
                            products.map((product) => (
                                <div key={product.id} className="p-5 bg-white shadow-md rounded-lg">
                                    <div className="flex gap-4 mb-3 items-center">
                                        <div className="border py-2 px-2 rounded-full">
                                            <img src={product.photo} alt={product.name}
                                                className="w-14 h-14 object-cover rounded"
                                            />
                                        </div>
                                        <div className="">
                                            {
                                                product.stock > 0 ?
                                                    <>
                                                        <h2>In stock:</h2>
                                                        <h2 className='text-green-700 text-lg font-semibold'>150</h2>
                                                    </>
                                                    :
                                                    <>
                                                        <h2 className='text-red-700'>Out of stock:</h2>
                                                    </>
                                            }
                                            {
                                                product.discoutn > 0 &&
                                                    <>
                                                        <h3 className='text-red-700'>{product.discoutn}% off</h3>
                                                    </>
                                            }

                                            
                                        </div>
                                    </div>
                                    <h3 className="text-lg font-semibold">{product.name}</h3>
                                    <p className="text-gray-600">{product.description}</p>
                                    <p className="text-green-600 font-bold">${product.price.toFixed(2)}</p>
                                </div>
                            ))
                        }

                    </div>
                </div>
            </div>
        </>
    )
}

export default AllProduct
import React, { useState } from 'react'

const Category = () => {
    const [active, setActive] = useState(0)
    const category = [
        { id: 1, name: 'All' },
        { id: 2, name: 'Medicine' },
        { id: 3, name: 'Health Care' },
        { id: 4, name: 'Personal Care' },
        { id: 5, name: 'Baby Care' },
        { id: 6, name: 'Fitness' },
    ]
    const handleCategoryClick = (id) => {
        setActive(id)
    }

    return (
        <>
            <div className="w-full">
                <ul className="">
                    <li onClick={() => handleCategoryClick(0)}
                        className={`cursor-pointer ${active === 0 ? 'bg-teal-500 text-white' : 'text-gray-700'} hover:bg-teal-500 hover:text-white text-lg border-b-2 border-r-2 border-gray-200 py-2 px-4`}>
                        All Category
                    </li>
                {category.map((cat) => (
                    <li key={cat.id} onClick={() => handleCategoryClick(cat.id)}
                        className={`cursor-pointer ${active === cat.id ? 'bg-teal-500 text-white' : 'text-gray-700'} hover:bg-teal-500 hover:text-white text-lg border-b-2 border-r-2 border-gray-200 py-2 px-4`}>
                        {cat.name}
                    </li>
                ))}
            </ul>
        </div >
        </>
    )
}

export default Category
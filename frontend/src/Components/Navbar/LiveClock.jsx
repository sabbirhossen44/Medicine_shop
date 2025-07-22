import React, { useEffect, useState } from 'react';

const LiveClock = () => {
    const [time, setTime] = useState(new Date());

    useEffect(() => {
        const interval = setInterval(() => {
            setTime(new Date());
        }, 1000); // update every second

        return () => clearInterval(interval); // cleanup
    }, []);

    const formattedTime = time.toLocaleTimeString('en-GB'); // 24-hour format
    const formattedDate = time.toLocaleDateString('en-GB'); // dd/mm/yyyy

    return (
        <div className="bg-transparent text-[#00bcd4] text-lg font-medium px-5 py-2.5 rounded-full inline-block shadow">
            {formattedTime} || {formattedDate}
        </div>
    );
};

export default LiveClock;

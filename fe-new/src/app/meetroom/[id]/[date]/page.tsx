'use client';
import React, { useEffect, useState } from 'react'
import Shape from '@/components/shape';
import { API_URL } from '@/utils/constants/config';
import { useParams } from 'next/navigation';
import Link from 'next/link';

export default function page() {
    const params = useParams();
    const [dataRoom, setDataRoom] = useState([]) as any[];
    const [dataRoomBook, setDataRoomBook] = useState([]) as any[];
    const [input, setInput] = useState({
        location: '',
        date: '',
        time: '',
    });
    const getDetailDataRoom = async () => {
        try {
            const response = await fetch(`${API_URL}room-meeting-book/${params?.id}`);
            const data = await response.json();
            setDataRoom(data?.data);
        } catch (err) {
            console.log(err);
        }
    }

    useEffect(() => {
        getDetailDataRoom();
    }, []);

    return (
        <div className='mt-12'>
            <Shape size="w-2/12" />
            <h2 className="font-Gilroy font-bold text-2xl text-biru py-3">
                {dataRoom?.name}
            </h2>
            <div className='bg-gray-200 px-8 py-6 mt-6'>
                <div className="flex flex-col gap-8">
                    <div className="flex items-center gap-6">
                        <label className='text-biru font-Gilroy font-semibold text-xl w-3/12'>
                            Judul Meeting
                        </label>
                        <div className='w-full'>
                            <input
                                type="text"
                                name='title_meeting'
                                // onChange={(e) => handleChange(e)}
                                className='w-full bg-white p-3 mt-1'
                            />
                        </div>
                    </div>
                    <div className="flex items-center gap-6">
                        <label className='text-biru font-Gilroy font-semibold text-xl w-3/12'>
                            Reservasi Atas Nama
                        </label>
                        <div className='w-full'>
                            <input
                                type="text"
                                name='reservation_name'
                                // onChange={(e) => handleChange(e)}
                                className='w-full bg-white p-3 mt-1'
                            />
                        </div>
                    </div>
                    <div className="flex items-center gap-6">
                        <label className='text-biru font-Gilroy font-semibold text-xl w-3/12'>
                            Durasi
                        </label>
                        <div className='w-full flex items-center gap-4'>
                            <input
                                type="date"
                                name='date_start'
                                // onChange={(e) => handleChange(e)}
                                className='w-full bg-white p-3 mt-1'
                            />
                            <input
                                type="time"
                                name='time_start'
                                // onChange={(e) => handleChange(e)}
                                className='w-full bg-white p-3 mt-1'
                            />
                            <label className='text-biru font-Gilroy font-semibold text-lg w-3/12'>
                                Sampai
                            </label>
                            <input
                                type="date"
                                name='date_end'
                                // onChange={(e) => handleChange(e)}
                                className='w-full bg-white p-3 mt-1'
                            />
                            <input
                                type="time"
                                name='time_end'
                                // onChange={(e) => handleChange(e)}
                                className='w-full bg-white p-3 mt-1'
                            />
                        </div>
                    </div>
                    <div className="flex items-center gap-6">
                        <label className='text-biru font-Gilroy font-semibold text-xl w-3/12'>
                            Keperluan
                        </label>
                        <div className='w-full'>
                            <textarea
                                name='purpose'
                                // onChange={(e) => handleChange(e)}
                                className='w-full bg-white p-3 mt-1'
                            />

                        </div>
                    </div>
                    <div className="flex justify-end">
                        <button className="font-Gilroy font-bold text-white text-lg text-center gap-2 bg-biru px-6 py-3 w-3/12">
                            ENTER
                        </button>
                    </div>
                </div>
            </div>
        </div>
    )
}

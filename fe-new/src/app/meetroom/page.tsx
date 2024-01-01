'use client'
import Shape from '@/components/Shape'
import Image from 'next/image';
import React from 'react'
import img_meet from './../../assets/meetroom.png'
import { IoIosArrowDropdown } from "react-icons/io";
import Select, { DropdownIndicatorProps, components } from 'react-select';
import moment from 'moment';
import { API_URL } from '@/utils/constants/config';
import { useEffect, useState } from 'react';
import RoomBook from './roomBook';

export default function page() {
  const [dataRoom, setDataRoom] = useState([]) as any[];
  const [dataRoomBook, setDataRoomBook] = useState([]) as any[];
  const [input, setInput] = useState({
    location: '',
    date: '',
    time: '',
  });
  const getDataRoom = async () => {
    try {
      const response = await fetch(`${API_URL}location-room-meeting`);
      const data = await response.json();
      const dataSelect = data.data.map((item: any) => {
        return {
          value: item.id,
          label: item.name,
        };
      }
      );
      console.log(dataSelect);
      setDataRoom(dataSelect);
    }catch(err){
      console.log(err);
    }
  }

  useEffect(() => {
    getDataRoom();
  }, []);

  const handleChange = (e: any, nameElement = '') => {
    const { name, value } = e.target ?? {name: nameElement, value: e};
    setInput({
      ...input,
      [name]: value
    });
  }

  const handleSearchRoom = async (e: any) => {
    e.preventDefault();
    if(!input?.location?.value || !input?.date || !input?.time) return alert('Please fill all field');
    const filter = {
      location: input?.location?.value as string,
      date: input.date,
      time: input.time,
    }
    const res = await fetch(`${API_URL}room-meeting-book?${new URLSearchParams(filter).toString()}`);
    const data = await res.json();
    setDataRoomBook(data?.data);
  }

  return (
    <section className="pt-14">
      <Shape size="w-2/12" />
      <h2 className="font-Gilroy font-bold text-2xl text-biru py-3">
        MEETING ROOM BOOKING
      </h2>
      <div className="lg:flex mt-5 bg-gray-200">
        <Image
          className="lg:w-7/12 object-cover"
          src={img_meet}
          alt="gambar"
        />
        <form onSubmit={handleSearchRoom} className='lg:w-5/12 m-3 py-12'>
          <div className="lg:flex lg:flex-col lg:justify-center w-full lg:gap-3">
            <div className='w-9/12 mx-auto'>
              <label className='text-biru font-Gilroy font-bold text-lg'>
                Lokasi
              </label>
              <Select
                placeholder='Pilih Lokasi'
                options={dataRoom}
                onChange={(e) => handleChange(e, 'location')}
                styles={{
                  control: (base, state) => ({
                    ...base,
                    border: state.isFocused ? 0 : 0,
                    boxShadow: state.isFocused ? 0 : 0,
                    "&:hover": {
                      border: state.isFocused ? 0 : 0
                    },
                    padding: 6
                  }),
                  option: (base, state) => ({
                    ...base,
                    color: state.isSelected ? "#fff" : "#000371",
                    backgroundColor: state.isSelected ? "#000371" : "#fff",
                    "&:hover": {
                      color: state.isSelected ? "#fff" : "#fff",
                      backgroundColor: state.isSelected ? "#000371" : "#000371"
                    }
                  }),
                  menu: (baseStyles) => ({
                    ...baseStyles,
                    borderColor: 'var(--NN200,#D6DFEB)',
                    boxShadow: '0 1px 4px rgba(141,150,170,0.4)',          
                  }),
                  placeholder: (base) => ({
                    ...base,
                    color: "#000371",
                    fontWeight: "600",
                  }),
                  indicatorSeparator: (base) => ({
                    ...base,
                    display: "none"
                  }),
                }}
                components={{ 
                  DropdownIndicator: () => <IoIosArrowDropdown className='text-biru' size={24} />
                }}
                className='w-full bg-white mt-1'
              />
            </div>
            <div className='w-9/12 mx-auto'>
              <label className='text-biru font-Gilroy font-bold text-lg'>
                Tanggal
              </label>
              <input
                type="date"
                onChange={(e) => handleChange(e)}
                name='date'
                min={moment().format("YYYY-MM-DD")}
                className='w-full bg-white p-3 mt-1'
                placeholder='Tanggal'
              />
            </div>
            <div className='w-9/12 mx-auto'>
              <label className='text-biru font-Gilroy font-bold text-lg'>
                Jam
              </label>
              <input
                type="time"
                name='time'
                onChange={(e) => handleChange(e)}
                className='w-full bg-white p-3 mt-1'
                placeholder='Jam Berakhir'
              />
            </div>
            <div className="flex items-center justify-center mt-5 w-9/12 mx-auto">
              <button className="font-Gilroy font-bold text-white text-lg text-center gap-2 bg-biru p-3 w-full">
                ENTER
              </button>
            </div>
          </div>
        </form>
      </div>
      <RoomBook
        dataRoomBook={dataRoomBook}
        input={input}
      />
    </section>
  );
}

// const DropdownIndicator = (
//   props: DropdownIndicatorProps
// ) => {
//   return (
//     <components.DropdownIndicator {...props}>
     
//     </components.DropdownIndicator>
//   );
// };

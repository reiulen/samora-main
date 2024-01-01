import Link from 'next/link';
import React from 'react'

type Props = {
    dataRoomBook: any;
    input: any;
}
export default function RoomBook({
    dataRoomBook,
    input
} : Props) {
  return (
    <>
         <div className='mt-8 flex flex-wrap items-start'>
        {
          dataRoomBook?.map((item: any) => (
            <div className='lg:w-6/12 w-full px-8 py-4'>
              <h2 className='font-Gilroy font-bold text-2xl text-biru py-3'>
                    {item?.name}
              </h2>
              <Link href={`/meetroom/${item?.id}/${input?.date}`} className='font-Gilroy font-semibold text-white text-base text-center bg-biru px-8 py-2'>
                Book
              </Link>
              <div className='mt-5'>
                <div className='bg-gray-200 px-8 py-6'>
                    <h2 className='text-biru font-Gilroy font-semibold text-xl'>
                        EVENT LIST
                    </h2>
                    <div className='h-[8px] bg-kuning mt-3'></div>
                    <div className='flex flex-col gap-3 mt-4 min-h-[100px]' >
                        <div className='flex items-center justify-between'>
                            <h2 className='text-biru font-Gilroy font-semibold text-xl'>
                                10.00 - 11.00
                            </h2>
                            <h2 className='text-biru font-Gilroy font-semibold text-xl'>
                                Meeting
                            </h2>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          ))
        }
      </div>
    </>
  )
}

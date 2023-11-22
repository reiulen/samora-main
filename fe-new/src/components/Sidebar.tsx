import React from 'react'
import QuickLink from './QuickLink'
import Subsidiaries from './Subsidiaries'
import CalenderEvent from './CalenderEvent'
import Magazine from './Magazine'
import SocialMedia from './SocialMedia'

export default function Sidebar() {
  return (
    <section className='md:w-4/12 lg:w-3/12 lg:p-3 relative'>
        <QuickLink />
        <Subsidiaries />
        <CalenderEvent />
        <Magazine />
        <SocialMedia />
    </section>
  )
}

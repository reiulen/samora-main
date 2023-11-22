import React, { useState } from "react";
import { IoIosArrowDropdown } from "react-icons/io";

interface SelectByPtProps {
  dataPt: string[];
  onSelectCompany: (company: string | null) => void;
}

export default function SelectByPt({
  dataPt,
  onSelectCompany,
}: SelectByPtProps): JSX.Element {
  const [openPt, setOpenPt] = useState(false);
  const [userSelect, setUserSelect] = useState("CORPORATE DOCUMENT");

  const handleChange = (select: string): void => {
    setUserSelect(select);
    setOpenPt(false);
    onSelectCompany(select === "All" ? null : select);
  };

  return (
    <>
      <button
        onClick={() => setOpenPt(!openPt)}
        className="flex items-center gap-1"
      >
        <h2 className="font-Gilroy font-bold text-2xl text-biru py-3">
          {userSelect === "All" ? "CORPORATE DOCUMENT" : "CORPORATE DOCUMENT"}
        </h2>
        <IoIosArrowDropdown size={40} color="#000371" />
      </button>
      {openPt ? (
        <section className="flex flex-col gap-1 w-5/12 p-3 mt-2 shadow-xl ms-2 absolute z-10 bg-white">
          <button
            onClick={() => handleChange("All")}
            className="text-left text-biru hover:bg-slate-200 text-xl font-Gilroy font-bold"
          >
            All
          </button>
          {dataPt.map((company, index) => (
            <button
              onClick={() => handleChange(company)}
              className="text-left text-biru hover:bg-slate-200 text-xl font-Gilroy font-bold"
              key={index}
            >
              {company.toUpperCase()}
            </button>
          ))}
        </section>
      ) : null}
    </>
  );
}

import React, { useState } from "react";
import { IoIosArrowDropdown } from "react-icons/io";

interface SelectByFunctionProps {
  dataFunction: string[];
  onSelectFunction: (selectedFunction: string | null) => void;
}

export default function SelectByFunction({
  dataFunction,
  onSelectFunction,
}: SelectByFunctionProps): JSX.Element {
  const [openFunctionOption, setOpenFunctionOption] = useState(false);
  const [selectFunction, setSelectFunction] = useState("FUNCTION");

  // Menggunakan Set untuk menyimpan fungsi unik
  const uniqueFunctions = Array.from(new Set(dataFunction));

  const handleChangeSelectFunction = (selectedFunction: string) => {
    setSelectFunction(selectedFunction);
    setOpenFunctionOption(false);
    onSelectFunction(selectedFunction === "All" ? null : selectedFunction);
  };

  return (
    <div className="w-3/12 relative">
      <div className="flex flex-col absolute">
        <button
          onClick={() => setOpenFunctionOption(!openFunctionOption)}
          className="flex items-center gap-3 ps-3"
        >
          <h2 className="font-Gilroy font-bold text-xl text-biru py-3">
            {selectFunction === "All" ? "FUNCTION" : "FUNCTION"}
          </h2>
          <IoIosArrowDropdown size={30} color="#000371" />
        </button>
        {openFunctionOption
          ? ["All", ...uniqueFunctions].map((func, index) => (
              <button
                onClick={() => handleChangeSelectFunction(func)}
                key={index}
                className="flex items-center gap-1 bg-[#f5f4ee] ps-3 hover:bg-slate-200"
              >
                <h2 className="font-Gilroy font-bold text-xl text-biru py-3 pe-5">
                  {func.toUpperCase()}
                </h2>
              </button>
            ))
          : null}
      </div>
    </div>
  );
}

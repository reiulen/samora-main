import React from "react";

export default function Shape({ size = "w-3/12" }) {
  return <div className={`h-3 ${size} bg-kuning`}></div>;
}

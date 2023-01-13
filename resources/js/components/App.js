import React from "react";
import DataTable from "./DataTable";
import { BrowserRouter, Routes, Route, Navigate } from "react-router-dom";
import Heroes from "./Heroes";
import Weapons from "./Weapons";

const App = () => {
    return (
        <BrowserRouter>
            <Routes>
                <Route exact path="/" element={<Navigate  from="/" to="/heroes"/>}/>
                <Route path="/heroes" element={<Heroes />} />
                <Route path="/weapons" element={<Weapons />} />
            </Routes>
        </BrowserRouter>

    );
};

export default App;

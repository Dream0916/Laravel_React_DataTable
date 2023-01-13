import React from "react";
import DataTable from "./DataTable";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Heroes from "./Heroes";
import Weapons from "./Weapons";

const App = () => {
    return (
        <BrowserRouter>
            <Routes>
                <Route exact path="/" element={<Heroes />} />
                <Route path="/heroes" element={<Heroes />} />
                <Route path="/weapons" element={<Weapons />} />
            </Routes>
        </BrowserRouter>

    );
};

export default App;

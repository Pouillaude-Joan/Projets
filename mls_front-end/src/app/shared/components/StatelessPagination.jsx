import React, { useState } from "react";
import { MDBCol, MDBPageItem, MDBPageNav, MDBPagination, MDBRow } from "mdbreact";

const StatelessPagination = ({ changePage, totalPages }) => {

    const [currentPage, setCurentPage] = useState(0);
    const changePageComponent = (pageNumber) => {
        setCurentPage(pageNumber);
        changePage(pageNumber);
    }

    return (
        <MDBRow>
            <MDBCol>
                <MDBPagination circle color="teal">
                    <MDBPageItem disabled={currentPage === 0}>
                        <MDBPageNav aria-label="Previous" onClick={() =>  changePageComponent(currentPage - 1)}>
                            <span aria-hidden="true">&laquo;</span>
                            <span className="sr-only">Previous</span>
                        </MDBPageNav>
                    </MDBPageItem>
                    {
                        Array.from(Array(totalPages)).map((x, i) =>
                            <MDBPageItem active={i === currentPage} onClick={() =>  changePage(i)} key={i}>
                                <MDBPageNav>{i + 1}</MDBPageNav>
                            </MDBPageItem>
                        )
                    }
                    <MDBPageItem disabled={currentPage === totalPages - 1}>
                        <MDBPageNav onClick={() => changePage(currentPage + 1)}>
                            &raquo;
                        </MDBPageNav>
                    </MDBPageItem>
                </MDBPagination>
            </MDBCol>
        </MDBRow>
    )
}

export default StatelessPagination;
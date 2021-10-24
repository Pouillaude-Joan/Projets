import React from 'react'
// import Loader from '../shared/components/Loader'
import ApplicationDescriptionItem from '../components/homePageItems/ApplicationDescriptionItem';
import CardTitle from '../components/homePageItems/CardTitle';
import CarouselItemFirst from '../components/homePageItems/CarouselItemFirst';
import CarouselItemSecond from '../components/homePageItems/CarouselItemSecond';
import QuestionFirstTable from './../components/homePageItems/QuestionFirstTable';
import QuestionSecondTable from './../components/homePageItems/QuestionSecondTable';
import TutorialFirstTable from './../components/homePageItems/TutorialFirstTable';
// import TutorialSecondTable from './../components/homePageItems/TutorialSecondTable';
import TutorialManager from './../components/homePageItems/TutorialManager';


const HomeView = () => {

    return (
        <div className=" " col-12>
            {/* <Loader /> */}
      
            <ApplicationDescriptionItem/>
            <br/>
            <CardTitle/>
            <br/>
            <div className="container">
                <div className="d-flex justify-content-center">
                        <div className="list-group-item  border text-black ml-5 w-75">
                        <QuestionFirstTable/>
                        <br/>
                        <QuestionSecondTable/>
                    </div>
                    <div className="list-group-item  border text-black ml-5 w-75">
                        <TutorialFirstTable/>
                        <br/>
                        {/* <TutorialSecondTable/> */}
                        <TutorialManager/>
                    </div>
                </div>
                    <br/>

            </div>

            <div className="container"> 
                        <CarouselItemFirst/>
                            <hr/>
                        <CarouselItemSecond/>  
                    </div>
          
        </div>
    );
};

export default HomeView;
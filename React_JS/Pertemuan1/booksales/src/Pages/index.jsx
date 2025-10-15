import ContactSection from "../components/shared/ContactSection";
import Footer from "../components/shared/Footer";
import Header from "../components/shared/Header";
import Hero from "../components/shared/Hero";
import ProductList from "../components/shared/ProductList";
import TeamSection from "../components/shared/TeamSection";

export default function Home (){
    return(
        <>
            <Header/>
            <Hero/>
            <ProductList/>
            <TeamSection />
            <ContactSection/>
            <Footer/>
        </>
    )
}
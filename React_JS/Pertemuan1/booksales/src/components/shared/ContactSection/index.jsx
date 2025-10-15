export default function ContactSection(){
    return(
        <>
            <section id="contact" className="py-5">
          <div className="container">
            <h2 className="text-center mb-4">Contact Us</h2>
            <form className="mx-auto" style={{ maxWidth: 600 }}>
              <div className="mb-3">
                <label className="form-label">Your Name</label>
                <input type="text" className="form-control" placeholder="Enter your name" />
              </div>
              <div className="mb-3">
                <label className="form-label">Email address</label>
                <input type="email" className="form-control" placeholder="name@gmail.com" />
              </div>
              <div className="mb-3">
                <label className="form-label">Message</label>
                <textarea className="form-control" rows="4" placeholder="Type your message..."></textarea>
              </div>
              <button type="submit" className="btn btn-primary">Send Message</button>
            </form>
          </div>
        </section>
        </>
    )
}
import { useState } from "react";
import booksData from "../../../Utils/books";

export default function ProductList() {
  const [books, setBooks] = useState(booksData);
  const [newBook, setNewBook] = useState({
    title: "",
    author: "",
    year: "",
    description: "",
    image: "",
  });

  const handleChange = (e) => {
    setNewBook({ ...newBook, [e.target.name]: e.target.value });
  };

  const handleAddBook = () => {
    const { title, author, year, description, image } = newBook;
    if (!title || !author || !year || !description || !image) {
      alert("Semua field harus diisi!");
      return;
    }
    const newId = books.length + 1;
    const bookToAdd = {
      id: newId,
      ...newBook,
    };
    setBooks([...books, bookToAdd]);
    setNewBook({ title: "", author: "", year: "", description: "", image: "" });
  };

  return (
    <>
      <section className="py-5 text-center container">
        <div className="row py-lg-5">
          <div className="col-lg-6 col-md-8 mx-auto">
            <h1 className="fw-light">Best Seller</h1>
            <p className="lead text-body-secondary">
              Temukan koleksi buku terlaris pilihan pembaca—dengan cerita memikat dan kualitas yang tak diragukan, karya para penulis terbaik.
            </p>
          </div>
        </div>
      </section>

      {/* Form tambah buku */}
      <div className="container mb-5">
        <h4 className="mb-3">Tambah Buku Baru</h4>
        <div className="row g-2">
          <div className="col-md-2">
            <input
              type="text"
              name="title"
              value={newBook.title}
              onChange={handleChange}
              className="form-control"
              placeholder="Judul"
            />
          </div>
          <div className="col-md-2">
            <input
              type="text"
              name="author"
              value={newBook.author}
              onChange={handleChange}
              className="form-control"
              placeholder="Penulis"
            />
          </div>
          <div className="col-md-1">
            <input
              type="number"
              name="year"
              value={newBook.year}
              onChange={handleChange}
              className="form-control"
              placeholder="Tahun"
            />
          </div>
          <div className="col-md-3">
            <input
              type="text"
              name="description"
              value={newBook.description}
              onChange={handleChange}
              className="form-control"
              placeholder="Deskripsi"
            />
          </div>
          <div className="col-md-3">
            <input
              type="text"
              name="image"
              value={newBook.image}
              onChange={handleChange}
              className="form-control"
              placeholder="URL Gambar"
            />
          </div>
          <div className="col-md-1 d-grid">
            <button className="btn btn-primary" onClick={handleAddBook}>
              Tambah
            </button>
          </div>
        </div>
      </div>

      {/* Daftar buku */}
      <div className="album py-5 bg-body-tertiary">
        <div className="container">
          <div className="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            {books.map((book) => (
              <div className="col" key={book.id}>
                <div className="card shadow-sm h-100">
                  <img
                    src={book.image}
                    alt={book.title}
                    className="card-img-top"
                    style={{ height: "225px", objectFit: "cover" }}
                  />
                  <div className="card-body d-flex flex-column">
                    <h5 className="card-title">{book.title}</h5>
                    <p className="card-text text-muted">
                      {book.author} - {book.year}
                    </p>
                    <p className="card-text">{book.description}</p>
                    <div className="d-flex justify-content-between align-items-center mt-auto">
                      <button className="btn btn-sm btn-outline-primary">Lihat Buku</button>
                      <small className="text-muted">ID: {book.id}</small>
                    </div>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
    </>
  );
}

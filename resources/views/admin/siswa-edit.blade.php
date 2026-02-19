@extends('layout.master')

@section('title','Edit Siswa')
@section('konten_utama')
<div class="card">
                <div class="card-body">
                  <form>
                    <div class="mb-3">
                      <label for="nim" class="form-label">N I M</label>
                      <input type="text" class="form-control" id="nim" aria-describedby="nimHelp" name="nim">
                      <div id="nimHelp" class="form-text">Nomor Induk Murid angka semua.</div>
                    </div>
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="nama" aria-describedby="namaHelp" name="nama">
                      <div id="namaHelp" class="form-text">nama lengkap siswa.</div>
                    </div>
                    <div class="mb-3">
                      <label for="jenis" class="form-label">Jenis Kelamin</label>
                      <select class="form-select" id="jenis" name="jenis">
                        <option value="L">Lelaki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Tree</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://d3js.org/d3.v6.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('families.index') }}">Family Tree</a>
    </nav>
    <div class="container mt-5">
        @yield('content')
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const data = @json($families);
        const width = 960, height = 600;

        // Menggunakan stratify untuk menentukan struktur pohon
        const root = d3.stratify()
            .id(d => d.id)
            .parentId(d => d.parent_id)(data);

        // Menentukan layout pohon dengan jarak yang lebih dekat
        const treeLayout = d3.tree().size([width, height]);

        // Mengatur jarak antara node
        treeLayout.nodeSize([100, 150]);

        treeLayout(root);

        // Menambahkan SVG container untuk pohon keluarga
        const svg = d3.select("#familyTree").append("svg")
            .attr("width", width)
            .attr("height", height)
            .append("g")
            .attr("transform", "translate(500, 100)"); // Menggeser pohon agar tidak terlalu ke tepi kiri

        // Menambahkan garis untuk menghubungkan node
        svg.selectAll('line')
            .data(root.links())
            .enter()
            .append('line')
            .attr('x1', d => d.source.x)
            .attr('y1', d => d.source.y)
            .attr('x2', d => d.target.x)
            .attr('y2', d => d.target.y)
            .attr('stroke', '#ccc'); 

       
        const nodes = svg.selectAll('circle')
            .data(root.descendants())
            .enter()
            .append('g')
            .attr('transform', d => `translate(${d.x}, ${d.y})`);

        nodes.append('circle')
                .attr('r', 10)
                .attr('fill', d => d.data.jenis_kelamin === 'Laki-laki' ? '#1E90FF' : '#ff69b4'); 

        
        nodes.append('text')
            .attr('x', 8)
            .attr('y', -6)
            .text(d => d.data.nama)
            .attr('font-size', '18px')
            .attr('fill', 'black'); 
    });
</script>




</body>
</html>

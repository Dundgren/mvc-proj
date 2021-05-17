<nav class="nav">
    <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : null }}">Home</a> |
    <a href="{{ url('/game21') }}" class="{{ Request::is('game21', 'game21/*') ? 'active' : null }}">Game21</a> |
    <a href="{{ url('/winner') }}" class="{{ Request::is('winner') ? 'active' : null }}">Winners</a> |
    <a href="{{ url('/scoretable') }}" class="{{ Request::is('scoretable') ? 'active' : null }}">Scoretable</a>
</nav>

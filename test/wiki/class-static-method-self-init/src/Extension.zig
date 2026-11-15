const php = @import("php/root.zig");

pub const @"export Pet" = php.Class.Custom(struct {
    pub fn init(args: struct {
        name: []const u8,
    }) !@This() {
        return .{ .name = try php.allocator.dupe(u8, args.name) };
    }

    pub fn deinit(self: *@This()) void {
        php.allocator.free(self.name);
    }

    pub fn @"call say"(self: *@This(), args: struct {
        text: []const u8,
    }) void {
        const static = php.Singleton(Static).get();
        php.print("{s} the {s}: {s}\n", .{ self.name, static.species, args.text });
    }

    pub fn @"static call setSpecies"(static: *Static, args: struct {
        label: []const u8,
    }) !void {
        php.allocator.free(static.species);
        static.species = try php.allocator.dupe(u8, args.label);
    }

    const Static = struct {
        species: []const u8,

        pub fn init() !@This() {
            return .{ .species = try php.allocator.dupe(u8, "unknown") };
        }

        pub fn deinit(self: *@This()) void {
            php.allocator.free(self.species);
        }
    };

    name: []const u8,
});
